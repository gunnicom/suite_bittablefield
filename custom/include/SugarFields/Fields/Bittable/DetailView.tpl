<span id="bittableanker{{$vardef.name}}{{sugarvar key='id'}}"></span>
{{$vardef.bittablestyle}}
<script src="custom/include/SugarFields/Fields/Bittable/Bittable.js"></script>
<script>
    bitstring = new bitField("{{sugarvar key='value'}}");
    table = setupBitTable("{{$vardef.columnlabels}}", "{{$vardef.rowlabels}}", "bittable{{$vardef.name}}{{sugarvar key='id'}}");
    $("#bittableanker{{$vardef.name}}{{sugarvar key='id'}}").parent().append(table);
</script>