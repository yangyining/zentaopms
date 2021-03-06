<?php
class admin extends control
{
    /**
     * Configuration of xuanxuan.
     *
     * @access public
     * @return void
     */
    public function xuanxuan($type = '')
    {
        $this->app->loadLang('chat');
        if($_POST)
        {
            $setting = fixer::input('post')->join('staff', ',')->remove('https')->get();
            $errors  = array();

            if(!is_numeric($setting->chatPort) or (int)$setting->chatPort <= 0 or (int)$setting->chatPort > 65535) $errors['chatPort'] = $this->lang->chat->xxdPortError;
            if(!is_numeric($setting->commonPort) or (int)$setting->commonPort <= 0 or (int)$setting->commonPort > 65535) $errors['commonPort'] = $this->lang->chat->xxdPortError;
            if($setting->isHttps)
            {
                if(empty($setting->sslcrt)) $errors['sslcrt'] = $this->lang->chat->errorSSLCrt;
                if(empty($setting->sslkey)) $errors['sslkey'] = $this->lang->chat->errorSSLKey;
            }

            if($errors) $this->send(array('result' => 'fail', 'message' => $errors));

            $setting->server = ($setting->isHttps ? 'https' : 'http') . '://' . $setting->domain . ':' . $setting->commonPort;
            $result = $this->loadModel('setting')->setItems('system.common.xuanxuan', $setting, 'all');
            if(!$result) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('xuanxuan')));
        }

        $os = 'win';
        if(strpos(strtolower(PHP_OS), 'win') !== 0) $os = strtolower(PHP_OS);
        $isHttps = (isset($this->config->site->scheme) && $this->config->site->scheme == 'https') || $this->server->https == 'on' ? 1 : 0;
        if($isHttps == 0)
        {
            $url    = 'https://' . $this->server->http_host . getWebroot() . '?mode=getconfig';
            $snoopy = $this->app->loadClass('snoopy');
            $snoopy->referer = getWebroot(true);
            $snoopy->submit($url);
            $contents = $snoopy->results;
            $contents = json_decode($contents);
            if(!empty($contents)) $isHttps = 1;
        }

        $domain = $this->server->http_host;
        if(!empty($this->config->xuanxuan->server))
        {
            preg_match('/^(https?:\/\/)?([^\:]+)/i', $this->config->xuanxuan->server, $match);
            $domain = $match[2];
        }


        $this->view->title     = $this->lang->chat->common;
        $this->view->adminList = $this->loadModel('user')->getPairs('admin');
        $this->view->os        = $os . '_' . php_uname('m');
        $this->view->type      = $type;
        $this->view->domain    = $domain;
        $this->view->isHttps   = $isHttps;
        $this->display();
    }
}
