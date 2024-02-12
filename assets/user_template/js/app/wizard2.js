jQuery(function($) {
    var validate = {
        errorPlacement: function( error, element ) {
            if ( element.is( ":radio" ) || element.is( ":checkbox" ) ) {
                error.insertBefore( element.next() );

            } else {
                error.insertAfter( element );
            }
        }
    };

    // Example 1: Basic wizard with validation
    $( "#example-1" ).wizard({
        submit: ".submit",
        beforeForward: function( event, state ) {
            if ( state.stepIndex === 1 ) {
                $("#name").text($("[name=name]").val());

            } else if ( state.stepIndex === 2 ) {
                $("#gender").text($("[name=gender]").val());
            }
            return $( this ).wizard( "form" ).valid();
        }
    }).wizard( "form" ).submit(function( event ) {
        event.preventDefault();
        alert( "Form submitted!" );

    }).validate( validate );

    // Example 2: Basic wizard with progress bar
    $( "#progressbar" ).progressbar();

    $( "#example-2" ).wizard({
        afterSelect: function( event, state ) {
            $( "#progressbar" ).progressbar( "value", state.percentComplete );
            $( "#location" ).text( "(" + state.stepsComplete + "/" + state.stepsPossible + ")" );
        }
    });

    // Example 3: Basic branching wizard
    $( "#example-3" ).wizard({
        transitions: {
            color: function( state, action ) {
                var branch = state.step.find( "[name=color]:checked" ).val();

                if ( !branch ) {
                    alert( "Please select a value to continue." );
                }

                return branch;
            }
        }
    });

    // Example 4: Nested Branches
    $( "#example-4" ).wizard();

    // Example 5: Clearing input values before navigating to a step
    $( "#example-5" ).wizard({
        beforeBackward: function( event, state ) {
            state.step.find("input:text, input:password, input:file, select, textarea").val("");
            state.step.find("input:radio, input:checkbox").removeAttr("checked").removeAttr("selected");
        },
        beforeForward: function( event, state ) {
            return $( this ).wizard( "form" ).valid();
        }
    }).wizard( "form" ).validate( validate );

    // Example 6: Dynamically add steps to the wizard
    var $example6 = $( "#example-6" ).wizard();

    $example6.find( "[name=e6-howMany]" ).on( "change", function() {
        var $this = $( this );
        var howMany = $this.val();

        // Remove previously added dynamic steps
        $example6.find( ".step.dynamic" ).remove();

        // Add in selected number of steps
        for (var i = 0, l = howMany; i < howMany; i++) {
            $example6.find( ".steps" ).append(
                $( "<div>" ).addClass( "dynamic step" ).text( "Dynamically created step #" + (i + 1) )
            );
        }

        // Destroy and re-create the wizard
        $example6.wizard( "destroy" ).wizard();
    });
});