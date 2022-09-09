<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">健康新知</li>
    <li class="TabbedPanelsTab" tabindex="0">菸害防治</li>
    <li class="TabbedPanelsTab" tabindex="0">癌症防治</li>
    <li class="TabbedPanelsTab" tabindex="0">慢性病防治</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
        <h3>健康新知</h3>
        <pre><?=$news->find(1)['text'];?></pre>
    </div>
    <div class="TabbedPanelsContent">
        <h3>菸害防治</h3>
        <pre><?=$news->find(3)['text'];?></pre>
    </div>
    <div class="TabbedPanelsContent">
        <h3>癌症防治</h3>
        <pre><?=$news->find(5)['text'];?></pre>
    </div>
    <div class="TabbedPanelsContent">
        <h3>慢性病防治</h3>
        <pre><?=$news->find(7)['text'];?></pre>
    </div>
  </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>



