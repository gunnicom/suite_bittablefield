<span id="bittableanker{{$vardef.name}}{{sugar_fetch object=$parentFieldArray key='ID'}}"></span>
{{$vardef.bittablestyle}}
<script src="custom/include/SugarFields/Fields/Bittable/Bittable.js"></script>
<script>
    fieldname = "#{{$vardef.name}}";
    bitstring = new bitField("{{sugar_fetch object=$parentFieldArray key=$col}}");
    table = setupBitTable("{{$vardef.columnlabels}}", "{{$vardef.rowlabels}}", "bittable{{$vardef.name}}{{sugar_fetch object=$parentFieldArray key='ID'}}");
    $("#bittableanker{{$vardef.name}}{{sugar_fetch object=$parentFieldArray key='ID'}}").parent().append(table);
</script>