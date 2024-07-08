<?php
if (!function_exists('seoUrl')) {
    function seoUrl($string = null)
    {
        // Remove HTML Tags if found
        $string = strip_tags($string);
        // Replace special characters with white space
        $string = preg_replace('/[^A-Za-z0-9-]+/', ' ', $string);
        // Trim White Spaces and both sides
        $string = trim($string);
        // Replace whitespaces with Hyphen (-)
        $string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        // Conver final string to lowercase
        $slug = strtolower($string);
        return $slug;
    }
    /**
     * Return unique file name
     */
    function set_unique_image_file_name_on_save($unique_param = '', $extension = '')
    {
        $unique_param .= '-----';
        return base64_encode($unique_param) . '.' . $extension;
    }
    /**
     * This is just for added http if not
     */
    function addhttpIfNot($_url = null)
    {
        if ($_url == null) {
            return null;
        }
        $url = ltrim($_url, "/");
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return isDomainAvailible($url) == true ? $url : null;
    }
    /**
     * Validate URL
     */
    // function validateUrl($theURL)
    // {
    //     if (!filter_var($theURL, FILTER_VALIDATE_URL) === false) {
    //         return $theURL;
    //     } else {
    //         return false;
    //     }
    // }
    function isDomainAvailible($domain)
    {
        //check, if a valid url is provided
        if (!filter_var($domain, FILTER_VALIDATE_URL)) {
            return false;
        }
        //initialize curl
        $curlInit = curl_init($domain);
        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        //get answer
        $response = curl_exec($curlInit);
        curl_close($curlInit);
        if ($response) {
            return true;
        }

        return false;
    }
    function returnDifferenceTimeInMinitues($_to, $_from)
    {
        $to = new DateTime($_to);
        $from = new DateTime($_from);
        $diff = $to->diff($from);
        return ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;
    }
    /**
     * return time difference in microsend
     */
    function returnTimeDifferenceInMillisecond($_to, $_from)
    {
        $baseTime = strtotime($_to);
        $comparedWithTime = strtotime($_from);
        $diff = $baseTime - $comparedWithTime;
        return $diff * 1000;
    }
    /**
     * return time difference in microsend
     */
    function returnTimeDifferenceInSecond($_to, $_from)
    {
        $baseTime = strtotime($_to);
        $comparedWithTime = strtotime($_from);
        $diff = $baseTime - $comparedWithTime;
        return $diff;
    }
    /**
     * fomat millisecond
     */
    function formatSeconds($seconds)
    {
        $hours = 0;
        $milliseconds = str_replace("0.", '', $seconds - floor($seconds));
        if ($seconds > 3600) {
            $hours = floor($seconds / 3600);
        }
        $seconds = $seconds % 3600;
        return str_pad($hours, 2, '0', STR_PAD_LEFT)
        . gmdate(':i:s', $seconds)
            . ($milliseconds ? ".$milliseconds" : '')
        ;
    }
    /**
     * format second
     */
    function formatSecondToHHMMSS($seconds)
    {
        $hours = floor($seconds / 3600);
        $mins = floor($seconds / 60 % 60);
        $secs = floor($seconds % 60);
        
        if ($hours > 0) {
            return $hours."hour, ".$mins." min, ".$secs." sec";
        } else {
            return $mins." min, ".$secs." sec";
        }
    }
    /**
     * calculate parecentage amount
     */
    function calculationPercentageAmount($percentage, $amount){
        return $percentage > 0 && $amount > 0 ? ($percentage / 100) * $amount : 0;
    }
}
