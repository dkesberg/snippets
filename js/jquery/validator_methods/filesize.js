/**
 * Maximum filesize
 */
jQuery.validator.addMethod("filesize_max", function(value, element, param) {
    var isOptional = this.optional(element),
        file;

    if(isOptional) {
        return isOptional;
    }

    if ($(element).attr("type") === "file") {

        if (element.files && element.files.length) {

            file = element.files[0];
            return ( file.size && file.size <= param );
        }
    }
    return false;
}, jQuery.format("File size is too large."));
