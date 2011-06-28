{adminheader}<div class="z-admin-content-pagetitle">    {icon type="config" size="small"}    <h3>{gt text='Xinha configuration'}</h3></div><form class="z-form" action="{modurl modname="scribite" type="admin" func="updatexinha"}" method="post" enctype="application/x-www-form-urlencoded">    <div>        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />        <fieldset>            <legend>{gt text='Xinha configuration'}</legend>            <div class="z-formrow">                <img src="modules/Scribite/images/xinha-red.gif" width="48" height="50" alt="Powered by xinha" />            </div>            <div class="z-formrow">                <label for="xinha_language">{gt text="Language"}</label>                <select id="xinha_language" name="xinha_language">                    {html_options options=$xinha_langlist selected=$xinha_language}                </select>            </div>            <div class="z-formrow">                <label for="xinha_barmode">{gt text="Toolbar"}</label>                <select id="xinha_barmode" name="xinha_barmode">                    <option label="full" value="full"{if $xinha_barmode eq "full"} selected="selected"{/if}>{gt text="full"}</option>                    <option label="reduced" value="reduced"{if $xinha_barmode eq "reduced"} selected="selected"{/if}>{gt text="reduced"}</option>                    <option label="mini" value="mini"{if $xinha_barmode eq "mini"} selected="selected"{/if}>{gt text="mini"}</option>                </select>            </div>            <div class="z-formrow">                <label for="xinha_skin">{gt text="Skin"}</label>                <select id="xinha_skin" name="xinha_skin">                    {html_options options=$xinha_skinlist selected=$xinha_skin}                </select>            </div>            <div class="z-formrow">                <label>{gt text="Editor width and height"}</label>                <div>                    <input id="xinha_width" type="text" name="xinha_width" size="5" maxlength="6" value="{$xinha_width|safetext}" />                    <label for="xinha_width">{gt text="px/(auto)"}</label>                    <input id="xinha_height" type="text" name="xinha_height" size="5" maxlength="6" value="{$xinha_height|safetext}" />                    <label for="xinha_height">{gt text="px/(auto)"}</label>                </div>            </div>            <div class="z-formrow">                <label for="xinha_style">{gt text="Editor-Stylesheet"}</label>                <input id="xinha_style" type="text" name="xinha_style" size="40" maxlength="50" value="{$xinha_style|safetext}" />            </div>            <div class="z-formrow">                <label for="xinha_converturls">{gt text="Convert urls to links"}</label>                <input type="checkbox" id="xinha_converturls" name="xinha_converturls" value="1"{if $xinha_converturls eq "1"} checked="checked"{/if} />            </div>            <div class="z-formrow">                <label for="xinha_showloading">{gt text="Show loading"}</label>                <input type="checkbox" id="xinha_showloading" name="xinha_showloading" value="1"{if $xinha_showloading eq "1"} checked="checked"{/if} />            </div>            <div class="z-formrow">                <label for="xinha_statusbar">{gt text="Statusbar"}</label>                <input type="checkbox" id="xinha_statusbar" name="xinha_statusbar" value="1"{if $xinha_statusbar eq "1"} checked="checked"{/if} />            </div>        </fieldset>        <fieldset>            <legend>{gt text="Xinha Plugins (<a href=\"http://xinha.python-hosting.com/wiki/Plugins\" target=\"_blank\">documentation</a>)"}</legend>            <div class="z-formrow">                {html_checkboxes labels=false name="xinha_activeplugins" values=$xinha_allplugins output=$xinha_allplugins selected=$xinha_activeplugins|unserialize separator="<br />"}            </div>        </fieldset>        <div class="z-buttons z-formbuttons">            {button src='button_ok.png' set='icons/extrasmall' __alt="Save" __title="Save" __text="Save"}            <a href="{modurl modname='scribite' type='admin' func='modules'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>        </div>    </div></form>{adminfooter}