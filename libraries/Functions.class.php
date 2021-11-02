<?php
defined('_EXEC') or die;

class Functions
{
	public static function createLink( $link = null )
	{
		if ( is_null($link) )
			return '/' . self::getLangSystem();
		else
			return '/' . self::getLangSystem() . '/' . $link;
	}

	public static function getAvailableLanguages( $lang = null )
	{
		switch( $lang )
		{
			case 'es':
				return 'es';
				break;

			case 'en':
				return 'en';
				break;

			default:
				return Configuration::$langDefault;
				break;
		}
	}

	public static function getLangSystem()
	{
		switch( $_SESSION['lang'] )
		{
			case 'es':
				return 'es';
				break;

			case 'en':
				return 'en';
				break;
		}
	}

    public static function deleteLastCharacter( $string = false )
    {
        $string = substr(trim($string), 0, -1);
        return $string;
    }

    public static function raiting( $stars = false )
    {
        $response = "";

        if ( !is_null($stars) )
            $stars = explode('.', $stars);
        else
            $stars[0] = 0;

        for ($i=0; $i < $stars[0]; $i++)
            $response .= "<i class=\"material-icons\">star</i>\n";

        if ( isset($stars[1]) )
            $response .= "<i class=\"material-icons\">star_half</i>\n";

        $empty_star = 5 - $stars[0];
        $empty_star = ( isset($stars[1]) ) ? $empty_star - 1 : $empty_star;

        for ($i=0; $i < $empty_star; $i++)
            $response .= "<i class=\"material-icons\">star_border</i>\n";

        return $response;
    }

    public static function currencyExchange( $currency = 'EUR', $amount = 0 )
    {
        $database = new Medoo();
        $exchange = $database->select('settings', ['exchangues_rates']);

        if ( isset($exchange[0]) && !empty($exchange[0]) )
        {
            $exchange = json_decode($exchange[0]['exchangues_rates']);

            if ( $exchange->{$currency} )
            {
                $exchange = $exchange->{$currency};
                $response = $amount * $exchange;

                return $response;
            }

            return null;
        }

        return null;
    }
}
