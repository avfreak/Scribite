<!-- start scribite! with FCKeditor for {$modname} -->
<script type="text/javascript" src="{$editors_path}/{$editor_dir}/fckeditor.js"></script>
<script type="text/javascript">
/* <![CDATA[ */

fckload = function () {
{{foreach from=$modareas item=area}}
 var {{$modname}}FCKeditor = new FCKeditor( '{{$area}}' ) ;
 {{$modname}}FCKeditor.BasePath = '{{$editors_path}}/{{$editor_dir}}/' ;
 {{$modname}}FCKeditor.Config['CustomConfigurationsPath'] = '/modules/Scribite/config/cotype/fckeditor.js';
 {{$modname}}FCKeditor.Height = {{$fckeditor_height}} ;
 {{$modname}}FCKeditor.Width = {{$fckeditor_width}} ;
 {{$modname}}FCKeditor.ToolbarSet = "{{$fckeditor_barmode}}" ;
 {{$modname}}FCKeditor.CheckBrowser = true ;
{{if $fckeditor_autolang eq "1"}}
 {{$modname}}FCKeditor.Config[ "AutoDetectLanguage" ] = true ;
{{else}}
 {{$modname}}FCKeditor.Config[ "AutoDetectLanguage" ] = false ;
{{/if}}
 {{$modname}}FCKeditor.Config[ "DefaultLanguage"    ] = "{{$fckeditor_language}}" ;
 {{$modname}}FCKeditor.ReplaceTextarea() ;
{{/foreach}}
}

Event.observe(window, 'load', fckload);

/* ]]> */
</script>
<!-- end scribite with FCKeditor -->


