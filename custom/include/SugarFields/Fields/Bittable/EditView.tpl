<span id="bittableanker{{$vardef.name}}{{sugarvar key='id'}}"></span>
<input id="{{$vardef.name}}" name="{{$vardef.name}}" type="hidden" value="{{sugarvar key='value'}}"/>
{{$vardef.bittablestyle}}
<script src="custom/include/SugarFields/Fields/Bittable/Bittable.js"></script>
<script>
    fieldname = "#{{$vardef.name}}";
    bitstring = new bitField($(fieldname).val());
    table = setupBitTable("{{$vardef.columnlabels}}", "{{$vardef.rowlabels}}", "bittable{{$vardef.name}}{{sugarvar key='id'}}");
    $("#bittableanker{{$vardef.name}}{{sugarvar key='id'}}").parent().append(table);
    $(fieldname).val(bitstring.bitstring);
    setupFieldClickable(fieldname, "bittable{{$vardef.name}}{{sugarvar key='id'}}");
</script>