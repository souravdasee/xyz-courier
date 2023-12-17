<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border text-gray-900 dark:text-gray-100">
                    <form action="/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$checkouts['id']}}">

                        <p>Tracking ID: {{ $checkouts['tracking_id'] }}</p>
                        <label for="current_status">Current Status: </label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="current_status" autofocus required>
                            @foreach ($statses as $stats)
                                <option value="{{$stats['status']}}">{{$stats['status']}}</option>
                            @endforeach
                        </select>

                        <div class="p-2">
                            <label for="image">Image: </label>
                            <input accept="image/*" type="file" name="image" class="w-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>


                        <div class="p-2">
                            <label for="audio">Audio: </label>
                            <input accept="audio/*" type="file" name="voice" id="audio" class="w-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>


                        {{-- <label for="record">Audio: </label> --}}
                        {{-- <input type="button" name="voice" id="record" class="record border hover:bg-gray-500 hover:dark:bg-gray-700 text-blue-500 p-1" value="Record">
                        <div id="sound-clip"></div> --}}

                        {{-- <script>
                            document.querySelector('.record').addEventListener('click', function () {
                            // Top-level variable keeps track of whether we are recording or not.
                            let recording = false;

                            // Ask user for access to the microphone.
                            if (navigator.mediaDevices) {
                                navigator.mediaDevices
                                .getUserMedia({ audio: true })
                                .then(stream => {
                                    // Instantiate the media recorder.
                                    const mediaRecorder = new MediaRecorder(stream);

                                    // Create a buffer to store the incoming data.
                                    let chunks = [];
                                    mediaRecorder.ondataavailable = event => {
                                    chunks.push(event.data);
                                    };

                                    // When you stop the recorder, create a empty audio clip.
                                    mediaRecorder.onstop = event => {
                                    const audio = new Audio();
                                    audio.setAttribute('controls', '');
                                    $('#sound-clip').append(audio);
                                    $('#sound-clip').append('<br />');

                                    // Combine the audio chunks into a blob, then point the empty audio clip to that blob.
                                    const blob = new Blob(chunks, {
                                        type: 'audio/ogg; codecs=opus',
                                    });
                                    audio.src = window.URL.createObjectURL(blob);

                                    // Clear the `chunks` buffer so that you can record again.
                                    chunks = [];
                                    };

                                    // Set up event handler for the "Record" button.
                                    $('#record').on('click', () => {
                                    if (recording) {
                                        mediaRecorder.stop();
                                        recording = false;
                                        $('#record').html('Record');
                                    } else {
                                        mediaRecorder.start();
                                        recording = true;
                                        $('#record').html('Stop');
                                    }
                                    });
                                })
                                .catch(err => {
                                    // Throw alert when the browser is unable to access the microphone.
                                    console.log(
                                    "Oh no! Your browser cannot access your computer's microphone."
                                    );
                                });
                            } else {
                                // Throw alert when the browser cannot access any media devices.
                                console.log(
                                "Oh no! Your browser cannot access your computer's microphone. Please update your browser."
                                );
                            }
                            });
                        </script> --}}

                        {{-- <script
                            src="https://code.jquery.com/jquery-3.3.1.min.js"
                            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                            crossorigin="anonymous">
                        </script> --}}


                        <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
