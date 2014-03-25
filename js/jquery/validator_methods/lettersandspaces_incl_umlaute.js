/**
 * Only letters and spaces
 * Accepts german Umlaute
 */
jQuery.validator.addMethod("lettersandspaces", function(value, element) {
    return this.optional(element) || /^[a-zA-ZüöäÜÖÄß ]+$/i.test(value);
}, "Letters and spaces only please");
