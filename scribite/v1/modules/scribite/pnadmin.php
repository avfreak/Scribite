<?php
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
//
// @package scribite!
// @license http://www.gnu.org/copyleft/gpl.html
//
// @original author Andreas Krapohl
// @author sven schomacker
// @version 1.21 (.764)
//
 
function scribite_admin_main()
{
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  For the
    // main function we want to check that the user has at least edit privilege
    // for some item within this component, or else they won't be able to do
    // anything and so we refuse access altogether.  The lowest level of access
    // for administration depends on the particular module, but it is generally
    // either 'edit' or 'delete'
    if (!pnSecAuthAction(0, 'scribite::', '::', ACCESS_ADMIN)) {
        return pnVarPrepHTMLDisplay(_BADAUTHKEY);
    }
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $pnRender =& new pnRender();
    $pnRender->caching = false;
	  // get the output of the main function
	  $pnRender->assign('main', scribite_admin_modifyconfig(array()));
    // Return the output that has been generated by this function
    return $pnRender->fetch('scribite_admin_main.htm');

}

function scribite_admin_modifyconfig($args)
{
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  For the
    // main function we want to check that the user has at least edit privilege
    // for some item within this component, or else they won't be able to do
    // anything and so we refuse access altogether.  The lowest level of access
    // for administration depends on the particular module, but it is generally
    // either 'edit' or 'delete'
    if (!pnSecAuthAction(0, 'scribite::', '::', ACCESS_ADMIN)) {
        return pnVarPrepHTMLDisplay(_BADAUTHKEY);
    }

    // load tabber script
    global $additional_header;
    if (!is_array($additional_header))
    $additional_header = array();
    $additional_header[] = "<script type=\"text/javascript\" src=\"modules/scribite/pnjavascript/tabber.js\"></script>";
    
    // get all existing editors
    $editor_list = pnModAPIFunc('scribite', 'admin', 'getEditors', 'list');
    $xinhainstalled = pnModAPIFunc('scribite', 'admin', 'getEditors', 'xinha');
    $tinyinstalled = pnModAPIFunc('scribite', 'admin', 'getEditors', 'tiny_mce');
    $fckeditorinstalled = pnModAPIFunc('scribite', 'admin', 'getEditors', 'fckeditor');

    // check some parameters
    if ($xinhainstalled) {
        $xinha_language = pnModGetVar('scribite', 'xinha_language');
        if (empty($xinha_language)) {
            pnModSetVar('scribite', 'xinha_language', 'en');
        }
        $xinha_skin = pnModGetVar('scribite', 'xinha_skin');
        if (empty($xinha_skin)) {
            pnModSetVar('scribite', 'xinha_skin', 'blue-look');
        }
        $xinha_barmode = pnModGetVar('scribite', 'xinha_barmode');
        if (empty($xinha_barmode)) {
            pnModSetVar('scribite', 'xinha_barmode', 'reduced');
        }
        $xinha_width = pnModGetVar('scribite', 'xinha_width');
        if (empty($xinha_width)) {
            pnModSetVar('scribite', 'xinha_width', '600px');
        }
        $xinha_height = pnModGetVar('scribite', 'xinha_height');
        if (empty($xinha_height)) {
            pnModSetVar('scribite', 'xinha_height', '400px');
        }
        $xinha_style = pnModGetVar('scribite', 'xinha_style');
        if (empty($xinha_style)) {
            pnModSetVar('scribite', 'xinha_style', 'modules/scribite/pnconfig/xinha/editor.css');
        }      
    //end xinha parameters
    }

    // check some parameters
    if ($tinyinstalled) {
        $tinymce_language = pnModGetVar('scribite', 'tinymce_language');
        if (empty($tinymce_language)) {
            pnModSetVar('scribite', 'tinymce_language', 'en');
        }
        $tinymce_style = pnModGetVar('scribite', 'tinymce_style');
        if (empty($tinymce_style)) {
            pnModSetVar('scribite', 'tinymce_style', 'modules/scribite/pnconfig/tiny_mce/editor.css');
        }
        $tinymce_theme = pnModGetVar('scribite', 'tinymce_theme');
        if (empty($tinymce_theme)) {
            pnModSetVar('scribite', 'tinymce_theme', 'advanced');
        }
        $tinymce_width = pnModGetVar('scribite', 'tinymce_width');
        if (empty($tinymce_width)) {
            pnModSetVar('scribite', 'tinymce_width', '75%');
        }
        $tinymce_height = pnModGetVar('scribite', 'tinymce_height');
        if (empty($tinymce_height)) {
            pnModSetVar('scribite', 'tinymce_height', '400');
        }
        $tinymce_dateformat = pnModGetVar('scribite', 'tinymce_dateformat');
        if (empty($tinymce_dateformat)) {
            pnModSetVar('scribite', 'tinymce_dateformat', '%Y-%m-%d');
        }
        $tinymce_timeformat = pnModGetVar('scribite', 'tinymce_timeformat');
        if (empty($tinymce_timeformat)) {
            pnModSetVar('scribite', 'tinymce_timeformat', '%H:%M:%S');
        }       
    //end tinymce parameters
    }
    
    // check some parameters
    if ($fckeditorinstalled) {
        $fckeditor_language = pnModGetVar('scribite', 'fckeditor_language');
        if (empty($fckeditor_language)) {
            pnModSetVar('scribite', 'fckeditor_language', 'en');
        }
        $fckeditor_barmode = pnModGetVar('scribite', 'fckeditor_barmode');
        if (empty($fckeditor_barmode)) {
            pnModSetVar('scribite', 'fckeditor_barmode', 'Default');
        }
        $fckeditor_width = pnModGetVar('scribite', 'fckeditor_width');
        if (empty($fckeditor_width)) {
            pnModSetVar('scribite', 'fckeditor_width', '500');
        }
        $fckeditor_height = pnModGetVar('scribite', 'fckeditor_height');
        if (empty($fckeditor_height)) {
            pnModSetVar('scribite', 'fckeditor_height', '400');
        }
    //end fckeditor parameters
    }

    // Create output object - this object will store all of our output so that
    // we can return it easily when required

    $pnRender =& new pnRender();
    $pnRender->caching = false;
    $pnRender->assign(pnModGetVar('scribite'));
    $pnRender->assign('editor_main', pnModGetVar('scribite', 'editor'));
    $pnRender->assign('editor_list', $editor_list);
    $pnRender->assign('editor_allmodules', pnModAPIFunc('scribite', 'user', 'getModules'));

    // check for old javascripts directory
    $oldjsexists = file_exists('modules/scribite/pnincludes');
    if ($oldjsexists == true) {
        $pnRender->assign('oldjsexists', $oldjsexists);
    }
    
    if ($xinhainstalled) {
      $pnRender->assign('xinhainstalled', $xinhainstalled);
      $pnRender->assign('xinha_langlist', pnModAPIFunc('scribite', 'admin', 'getxinhaLangs'));
      $pnRender->assign('xinha_skinlist', pnModAPIFunc('scribite', 'admin', 'getxinhaSkins'));
      $pnRender->assign('xinha_allplugins', pnModAPIFunc('scribite', 'admin', 'getxinhaPlugins'));
    }
    
    if ($tinyinstalled) {
      $pnRender->assign('tinymceinstalled', $tinyinstalled);
      $pnRender->assign('tinymce_langlist', pnModAPIFunc('scribite', 'admin', 'gettinymceLangs'));
      $pnRender->assign('tinymce_themelist', pnModAPIFunc('scribite', 'admin', 'gettinymceThemes'));
      $pnRender->assign('tinymce_allplugins', pnModAPIFunc('scribite', 'admin', 'gettinymcePlugins'));
    }
    
    if ($fckeditorinstalled) {
      $pnRender->assign('fckeditorinstalled', $fckeditorinstalled);
      $pnRender->assign('fckeditor_barmodelist', pnModAPIFunc('scribite', 'admin', 'getfckeditorBarmodes'));
      $pnRender->assign('fckeditor_langlist', pnModAPIFunc('scribite', 'admin', 'getfckeditorLangs'));
    }
    
    return $pnRender->fetch('scribite_admin_modifyconfig.htm');
}

function scribite_admin_updateconfig($args)
{
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  For the
    // main function we want to check that the user has at least edit privilege
    // for some item within this component, or else they won't be able to do
    // anything and so we refuse access altogether.  The lowest level of access
    // for administration depends on the particular module, but it is generally
    // either 'edit' or 'delete'
    if (!pnSecAuthAction(0, 'scribite::', '::', ACCESS_ADMIN)) {
        return pnVarPrepHTMLDisplay(_BADAUTHKEY);
    }
    
    $xinhainstalled = pnModAPIFunc('scribite', 'admin', 'getEditors', 'xinha');
    $tinyinstalled = pnModAPIFunc('scribite', 'admin', 'getEditors', 'tiny_mce');
    $fckeditorinstalled = pnModAPIFunc('scribite', 'admin', 'getEditors', 'fckeditor');
    
    list($editor_main, 
         $editor_activemodules,
         $editors_path,
         $xinha_language,
         $xinha_skin, 
         $xinha_barmode, 
         $xinha_width, 
         $xinha_height, 
         $xinha_style,
         $xinha_converturls,
         $xinha_showloading,
         $xinha_activeplugins,
         $tinymce_language, 
         $tinymce_style,
         $tinymce_theme,
         $tinymce_width,
         $tinymce_height,
         $tinymce_activeplugins,
         $tinymce_dateformat,
         $tinymce_timeformat,
         $tinymce_ask,
         $fckeditor_language,
         $fckeditor_barmode,
         $fckeditor_width,
         $fckeditor_height,
         $fckeditor_autolang) = pnVarCleanFromInput('editor_main', 
                                                    'editor_activemodules', 
                                                    'editors_path',
                                                    'xinha_language', 
                                                    'xinha_skin', 
                                                    'xinha_barmode', 
                                                    'xinha_width', 
                                                    'xinha_height', 
                                                    'xinha_style',
                                                    'xinha_converturls',
                                                    'xinha_showloading',
                                                    'xinha_activeplugins',
                                                    'tinymce_language', 
                                                    'tinymce_style',
                                                    'tinymce_theme',
                                                    'tinymce_width',
                                                    'tinymce_height',
                                                    'tinymce_activeplugins',
                                                    'tinymce_dateformat',
                                                    'tinymce_timeformat',
                                                    'tinymce_ask',
                                                    'fckeditor_language',
                                                    'fckeditor_barmode',
                                                    'fckeditor_width',
                                                    'fckeditor_height',
                                                    'fckeditor_autolang'); 
    
    extract($args);   

    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('scribite', 'admin', 'main'));
        return true;
    }
    if(!empty($editor_activemodules)) {
    	$editor_activemodules = serialize($editor_activemodules);
    }  
    if(!pnModSetVar('scribite', 'editor_activemodules', $editor_activemodules)) {
        pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
        return false;
    }
    if(!pnModSetVar('scribite', 'editor', $editor_main)) {
        pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
        return false;
    }
    if(!pnModSetVar('scribite', 'editors_path', $editors_path)) {
        pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
        return false;
    }

    // xinha settings
    if ($xinhainstalled) {
          if(!pnModSetVar('scribite', 'xinha_language', $xinha_language)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'xinha_skin', $xinha_skin)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'xinha_barmode', $xinha_barmode)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'xinha_width', $xinha_width)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'xinha_height', $xinha_height)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'xinha_style', $xinha_style)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'xinha_converturls', $xinha_converturls)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'xinha_showloading', $xinha_showloading)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!empty($xinha_activeplugins)) {
          	$xinha_activeplugins = serialize($xinha_activeplugins);
          }  
          if(!pnModSetVar('scribite', 'xinha_activeplugins', $xinha_activeplugins)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
    }
    // end xinha settings
    
    // tiny_mce setting
    if ($tinyinstalled) {
          if(!pnModSetVar('scribite', 'tinymce_language', $tinymce_language)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'tinymce_style', $tinymce_style)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'tinymce_theme', $tinymce_theme)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'tinymce_width', $tinymce_width)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'tinymce_height', $tinymce_height)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!empty($tinymce_activeplugins)) {
          	$tinymce_activeplugins = serialize($tinymce_activeplugins);
          }  
          if(!pnModSetVar('scribite', 'tinymce_activeplugins', $tinymce_activeplugins)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'tinymce_dateformat', $tinymce_dateformat)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'tinymce_timeformat', $tinymce_timeformat)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'tinymce_ask', $tinymce_ask)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
    }
    // end tiny_mce settings
    
    // fckeditor setting
    if ($fckeditorinstalled) {
          if(!pnModSetVar('scribite', 'fckeditor_language', $fckeditor_language)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'fckeditor_barmode', $fckeditor_barmode)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'fckeditor_width', $fckeditor_width)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'fckeditor_height', $fckeditor_height)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
          if(!pnModSetVar('scribite', 'fckeditor_autolang', $fckeditor_autolang)) {
              pnSessionSetVar('errormsg', _EDITORNOCONFCHANGE);
              return false;
          }
    }
    // end fckeditor settings
    
    pnSessionSetVar('statusmsg', _CONFIGUPDATED);
    return pnRedirect(pnModURL('scribite', 'admin', 'main'));
}

?>
