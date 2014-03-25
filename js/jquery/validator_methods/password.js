/**
 * Validate password strings for uppercase, lowercase & digits
 */
jQuery.validator.addMethod("password", function(value, element) {
    return this.optional(element) || /^(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/.test(value);
}, "Invalid password format. You must use at least 8 characters. Your password must contain uppercase and lowercase letters and digits.");
