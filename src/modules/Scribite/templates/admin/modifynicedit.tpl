{adminheader}<div class="z-admin-content-pagetitle">    {icon type="config" size="small"}    <h3>{gt text='NicEdit configuration'}</h3></div><form class="z-form" action="{modurl modname="scribite" type="admin" func="updatenicedit"}" method="post" enctype="application/x-www-form-urlencoded">    <div>        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />        <fieldset>            <legend>{gt text='NicEdit configuration'}</legend>            <div class="z-formrow">                <img src="modules/Scribite/images/nicedit.png" height="48" width="119" alt="nicEdit - micro inline wysiwyg" />            </div>            <div class="z-formrow">                <label for="nicedit_fullpanel">{gt text="Full toolbar"}</label>                <input type="checkbox" id="nicedit_fullpanel" name="nicedit_fullpanel" value="1"{if $nicedit_fullpanel eq "1"} checked="checked"{/if} />            </div>            <div class="z-formrow">                <label for="nicedit_xhtml">{gt text="XHTML (experimental)"}</label>                <input type="checkbox" id="nicedit_xhtml" name="nicedit_xhtml" value="1"{if $nicedit_xhtml eq "1"} checked="checked"{/if} />            </div>        </fieldset>        <div class="z-buttons z-formbuttons">            {button src='button_ok.png' set='icons/extrasmall' __alt="Save" __title="Save" __text="Save"}            <a href="{modurl modname='scribite' type='admin' func='modules'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>        </div>    </div></form>{adminfooter}