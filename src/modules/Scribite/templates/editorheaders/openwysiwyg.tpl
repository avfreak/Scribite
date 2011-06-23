{* openwysiwyg deprecated @4.3.0 *}
<!-- start scribite! with openWYSIWYG for {$modname} -->
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/scripts/wysiwyg.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
  /********************************************************************
   * openWYSIWYG settings file Copyright (c) 2006 openWebWare.com
   * Contact us at devs@openwebware.com
   * This copyright notice MUST stay intact for use.
   *
   * $Id$
   ********************************************************************/

    var full = new WYSIWYG.Settings();
    full.ImagesDir = "{{$baseurl}}/{{$editors_path}}/{{$editor_dir}}/images/";
    full.PopupsDir = "{{$baseurl}}/{{$editors_path}}/{{$editor_dir}}/popups/";
    full.CSSFile = "{{$baseurl}}/{{$editors_path}}/{{$editor_dir}}/styles/wysiwyg.css";
    full.Width = "{{$openwysiwyg_width}}px";
    full.Height = "{{$openwysiwyg_height}}px";
    full.ReplaceLineBreaks = true;
    full.ContextMenu = true;
    full.DefaultStyle = "font-family: Arial; font-size: 12px; background-color: #FFFFFF";
    full.DisabledStyle = "font-family: monospace; font-size: 12px; background-color: #DCDCDC";
    full.StatusBarEnabled = true;
    // customize toolbar buttons
    full.addToolbarElement("font", 3, 1);
    full.addToolbarElement("fontsize", 3, 2);
    // openImageLibrary addon implementation
    full.ImagePopupFile = "{{$baseurl}}/{{$editors_path}}/{{$editor_dir}}/addons/imagelibrary/insert_image.php";
    full.ImagePopupWidth = 600;
    full.ImagePopupHeight = 245;

    var reduced = new WYSIWYG.Settings();
    reduced.ImagesDir = "{{$baseurl}}/{{$editors_path}}/{{$editor_dir}}/images/";
    reduced.PopupsDir = "{{$baseurl}}/{{$editors_path}}/{{$editor_dir}}/popups/";
    reduced.CSSFile = "{{$baseurl}}/{{$editors_path}}/{{$editor_dir}}/styles/wysiwyg.css";
    reduced.Width = "{{$openwysiwyg_width}}";
    reduced.Height = "{{$openwysiwyg_height}}";
    reduced.ReplaceLineBreaks = true;
    reduced.ContextMenu = true;
    reduced.DefaultStyle = "font-family: Arial; font-size: 12px; background-color: #FFFFFF";
    reduced.DisabledStyle = "font-family: monospace; font-size: 12px; background-color: #DCDCDC";
    reduced.Toolbar[0] = new Array("createlink", "insertimage", "seperator", "bold", "italic", "underline", "seperator", "justifyleft", "justifycenter", "justifyright", "seperator", "unorderedlist", "orderedlist", "seperator", "help"); // small setup for toolbar 1
    reduced.Toolbar[1] = ""; // disable toolbar 2
    reduced.StatusBarEnabled = false;

{{if $modareas eq "all"}}
      WYSIWYG.attach('all', {$openwysiwyg_barmode});
{{else}}
    {{section name=modareas loop=$modareas}}
      WYSIWYG.attach("{{$modareas[modareas]}}", {{$openwysiwyg_barmode}});
    {{/section}}
{{/if}}

/* ]]> */
</script>
<!-- end scribite! with openWYSIWYG -->


