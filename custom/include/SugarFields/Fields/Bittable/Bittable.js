function setupBitTable(columnlabels, rowlabels, id) {
    var columnlbl = columnlabels.split(";");
    var rowlbl = rowlabels.split(";");
    var rows = rowlbl.length;
    var columns = columnlbl.length;
    var table = "<div><table id='" + id + "' class='bittable'>";
    var bitcount = 0;
    table += "<tr><th></th><th>" + columnlbl.join("</th><th>") + "</th></tr>"
    while (rows > 0) {
        var rowcolumns = columns;
        table += "<tr>"
        table += "<th>" + rowlbl[rowlbl.length - rows] + "</th>";
        while (rowcolumns > 0) {
            table += "<td class='bittablebit " + (bitstring.isBitSet(bitcount) ? "bittrue" : "bitfalse") + "' data-bittable-bit='" + bitcount + "'>&nbsp;</td>";
            bitcount++;
            rowcolumns--;
        }
        table += "</tr>"
        rows--;
    }
    table += "</table></div>";
    bitstring.setLength(bitcount);

    return table;
}

function setupFieldClickable(fieldname, id) {
    
    $("#" + id + ".bittable tr th").first().text("<->").click(function () {
        console.log("Debug: " + "#" + id + ".bittable tr th")
        $("#" + id + " .bittablebit").each(function (elem) {
            var bitstring = new bitField($(fieldname).val());
            bitstring.xorBit($(this).data("bittable-bit"));
            $(fieldname).val(bitstring.bitstring);
            $(this).toggleClass("bittrue bitfalse");
        });
    });
    $("#" + id + " .bittablebit").click(function (elem) {
        var bitstring = new bitField($(fieldname).val());
        bitstring.xorBit($(this).data("bittable-bit"));
        $(fieldname).val(bitstring.bitstring);
        $(this).toggleClass("bittrue bitfalse");
    });
}

// class bitField
function bitField(bitstring) {
    // bitnumber is the number in the string from the last character oposite to normal string operations as the lowest bit is the last char in the string
    this.bitstring = bitstring;
    this.setLength = function (length) {
        this.bitstring = this.bitstring.padStart(length, "0");
    }
    this.getBit = function (bitnumber) {
        return this.bitstring.charAt(this.bitstring.length - 1 - bitnumber);
    };
    this.xorBit = function (bitnumber) {
        this.setCharAt(this.bitstring.length - 1 - bitnumber, (this.bitstring.charAt(this.bitstring.length - 1 - bitnumber) == "1" ? "0" : "1"));
    };
    this.isBitSet = function (bitnumber) {
        if (this.bitstring.charAt(this.bitstring.length - 1 - bitnumber) == "1") {
            return true;
        }
        return false;
    };
    this.setCharAt = function (bitnumber, replacement) {
        if (!(bitnumber > this.bitstring.length - 1))
            this.bitstring = this.bitstring.substr(0, bitnumber) + replacement + this.bitstring.substr(bitnumber + 1);
    };
}
