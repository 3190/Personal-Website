<?php
// site root path
define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

// plugin directory (relative path)
define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

// theme directory (relative path)
define('__TYPECHO_THEME_DIR__', '/usr/themes');

// admin directory (relative path)
define('__TYPECHO_ADMIN_DIR__', '/admin/');

// register autoload
require_once __TYPECHO_ROOT_DIR__ . '/var/Typecho/Common.php';

// init
\Typecho\Common::init();

// config db
$db = new \Typecho\Db('SQLite', 'typecho_');
$db->addServer(array (
  'file' => 'C:\\Users\\Starnight\\Desktop\\untitled3\\untitled3\\typecho/usr/6609614cbc7ed.db',
  //把这个调一下就好啦awa
  //填什么awa
  //注意到typecho/usr/6609614cbc7awa
), \Typecho\Db::READ | \Typecho\Db::WRITE);
\Typecho\Db::set($db);
