{adminheader}<div class="z-admin-content-pagetitle">    {img src='markitup.jpg' modname='Scribite' height='22'}    <h3>{gt text='Markitup Editor configuration'}</h3></div><form class="z-form" action="{modurl modname="scribite" type="admin" func="updatemarkitup"}" method="post" enctype="application/x-www-form-urlencoded">    <div>        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />        <fieldset>            <legend>{gt text='Configuration'}</legend>            <div class="z-formrow">                <label>{gt text="Editor width and height"}</label>                <div>                    <input id="markitup_width" type="text" name="markitup_width" size="5" maxlength="6" value="{$markitup_width|safetext}" />                    <label for="markitup_width">{gt text="%/px/auto"}</label>                    <input id="markitup_height" type="text" name="markitup_height" size="5" maxlength="6" value="{$markitup_height|safetext}" />                    <label for="markitup_height">{gt text="%/px/auto"}</label>					<span class="z-informationmsg">{gt text="e.g. 99% or 400px or auto"}</span>                </div>            </div>        </fieldset>        <div class="z-buttons z-formbuttons">            {button src='button_ok.png' set='icons/extrasmall' __alt="Save" __title="Save" __text="Save"}            <a href="{modurl modname='scribite' type='admin' func='modules'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>        </div>    </div></form>{adminfooter}