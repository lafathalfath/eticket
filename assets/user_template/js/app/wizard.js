$('#wizard_container').wizard({
    stepsWrapper: '#wrapped',
    stepClasses: {
    // current: '.request',
    //     // exclude: 'step',
        stop: '.request',
        // submit: '.submit'
    },
	submit: '.submit',
	beforeSelect: function (forward, backward) {
		if ($('input#website').val().length != 0) {
			return false
		};
		if (!backward.isMovingForward) {
			return true
		};
		var ele = $(this).wizard('state').step.find(':input');
		return !ele.length || !!ele.valid()
	},
	transitions: {
		branchtype: function (state, action) {
			var check = state.find(':checked').val();
			if (!check) {
				$('form').valid()
			};
			return check
		}
	}
})