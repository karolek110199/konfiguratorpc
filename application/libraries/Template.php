<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{   
    protected $CI;
    
    public $layout = 'layout';
    
    protected $data = array();
    
    protected $css = array();

    protected $javascripts = array();

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->config($this->CI->config->item('template_settings_file'));
        $this->data = $this->CI->config->item('template');
    }
    
    public function render() {
	    if(!isset($this->data['content']) || $this->data['content'] == '') $this->data['content'] = $this->data['main_view'];
        $this->CI->load->view($this->layout, $this->data);
    }
    
    public function renderView($view, $table = false) {
        if($table) {
            $this->set_data($table);
        }
        $this->CI->load->view($view, $this->data);
    }
    
    public function set_data($table) {
        $this->data = array_merge($this->data, $table);
    }
    
    public function add_css($css) {
	    $this->css = array_merge($this->css, $css);
    }
    
    public function render_css() {
	    foreach($this->css as $css) {
            if($css['dir'] != 'http') {
                $dir = (isset($css['dir'])) ? $css['dir'] : 'css_dir';
                $src = (isset($this->data[$dir])) ? $this->data[$dir].$css['name'] : $dir.'/'.$css['name'];
                echo '<link rel="stylesheet" href="'.base_url($src).'">';
            } else {
                $src = $css['name'];
                echo '<link rel="stylesheet" href="'.$src.'">';
            }
	    }
    }
    
    public function add_javascripts($js) {
        //$js = array(array('dir' => 'js_dir', 'name' => 'xx.js'))
	    $this->javascripts = array_merge($this->javascripts, $js);
    }
    
    public function render_javascripts() {
	    foreach($this->javascripts as $js) {
            if($js['dir'] != 'http') {
                $dir = (isset($js['dir'])) ? $js['dir'] : 'js_dir';
                $src = (isset($this->data[$dir])) ? $this->data[$dir].$js['name'] : $dir.'/'.$js['name'];
                echo '<script type="text/javascript" src="'.base_url($src).'"></script>';
            } else {
                $src = $js['name'];
                echo '<script type="text/javascript" src="'.$src.'"></script>';
            }
	    }
    }
    
    public function __set($name, $value) {
	    $this->data[$name] = $value;
    }
    
    public function __get($name) {
	    return $this->data[$name];
    }
}
