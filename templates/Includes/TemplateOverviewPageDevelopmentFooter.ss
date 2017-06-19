<% if IncludeTemplateoverviewDevelopmentFooter %>
<div id="TemplateoverviewPageDevelopmentFooter">
	<p>
		<% if TemplateoverviewPage.CanView %>This page uses the <a href="{$TemplateoverviewPage.Link}showmore/$ID" class="seeFullTemplateDetails">$ClassName</a>
		<a href="{$TemplateoverviewPage.Link}">template</a>.
		<% else %>
		<a href="{$TemplateoverviewPage.Link}">review templates</a>.
		<% end_if %>
	</p>
	<ul id="TemplateoverviewPageDevelopmentFooterLoadHere"><li class="hiddenListItem">&nbsp;</li></ul>
</div>
<% end_if %>

