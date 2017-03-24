(function () {
    // Operator interface globals.
    let connection = null;

    // Fetch the list of plays from the server.
    const getPlays = function () {
        return new Promise((resolve, reject) => {
            const request = new XMLHttpRequest();

            request.addEventListener('load', function () {
                try {
                    resolve(JSON.parse(this.response));
                } catch (e) {
                    reject(e);
                }
            });

            request.addEventListener('error', function (e) {
                reject(e);
            });

            request.open('GET', '/api/plays.json', true);
            request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            request.send(null);
        });
    };

    // Populate list of plays in the UI.
    const populatePlaysList = function (plays) {
        const playListElem = document.getElementsByClassName('play-list')[0];

        plays.sort((a, b) => {
            const A = a.name.toUpperCase();
            const B = b.name.toUpperCase();

            if (A < B) {
                return -1;
            } else if (A > B) {
                return 1;
            } else {
                return 0;
            }
        });

        plays.forEach(function (play) {
            // <div class="checkbox">
            const playElem = document.createElement('div');
            playElem.classList.add('checkbox');

            //   <label>
            const playElemLabel = document.createElement('label');

            //     <input>
            //     {{ play.name }}
            const playElemLabelInput = document.createElement('input');
            playElemLabelInput.type = 'checkbox';
            playElemLabelInput.name = 'playList[]';
            playElemLabelInput.value = play.value;
            const playElemLabelText = document.createTextNode(play.name);

            //   </label>
            playElemLabel.appendChild(playElemLabelInput);
            playElemLabel.appendChild(playElemLabelText);

            // </div>
            playElem.appendChild(playElemLabel);
            playListElem.appendChild(playElem);
        });
    };

    // Form submission callback.
    const playTrackerFormHandler = function (e) {
        e.preventDefault();

        const form = e.target;
        const selected = Array.from(form.elements['playList[]'])
            .filter(item => item.checked)
            .map(item => parseInt(item.value));
        console.log('Sending events: ', selected);
        connection.send(JSON.stringify(selected));
        toastr.info('Plays successfully submitted!');

        // Submit the data to the server.
        jQuery.ajax({
            url: '/Web Application/insert.php',
            method: 'POST',
            data: jQuery(form).serialize(),
            success: function (data, textStatus, jqXHR) {
            console.log('Events successfully persisted to server');

            // Clear the fields.
            Array.from(form.elements['playList[]'])
                .forEach(item => item.checked = false);
            },
            error: function (jqXHR, textStatus, errorThrown) {
            console.log('Error persisting data to server: ', errorThrown);
            }
        });

        // Uncheck everything.
        Array.from(form.elements['playList[]'])
            .forEach(item => item.checked = false);
    };

    // Connect to the notifier server.
    getPlays()
        .then(function (plays) {
            populatePlaysList(plays);

            connection = new WebSocket(PLAYBOOK_NOTIFIER_URL);
            connection.addEventListener('open', function () {
                console.log('Connected to WebSocket server at ' + connection.url);

                // Listen on the play tracker form.
                const playTrackerForm = document.getElementById('play-tracker-form');
                playTrackerForm.addEventListener('submit', playTrackerFormHandler);
            });
        })
        .catch(function (e) {
            console.log('Error loading operator console: ', e);  
        });
})();