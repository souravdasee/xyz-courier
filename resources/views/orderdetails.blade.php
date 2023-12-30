<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Sender Name: {{$checkouts->sender_name}}</p>
                    <p>Sender Contact Number: {{$checkouts->sender_number}}</p>
                    <p>Sender Adderss: {{$checkouts->sender_address}}</p>
                    <p>Recipient Name: {{$checkouts->recipient_name}}</p>
                    <p>Recipient Contact Number: {{$checkouts->recipient_number}}</p>
                    <p>Recipient Address: {{$checkouts->recipient_address}}</p>
                    <p>Parcel From: {{$checkouts->from}}</p>
                    <p>Parcel To: {{$checkouts->to}}</p>
                    <p>Distance: {{$checkouts->distance}}</p>
                    <p>Weight: {{$checkouts->weight}}</p>
                    <p>Parcel Amount: {{$checkouts->parcel_amount}}</p>
                    <p>Payment Method: {{$checkouts->payment_method}}</p>
                    <p>Payment Status: {{$checkouts->payment_status}}</p>
                    <p>Current Status: {{$checkouts->current_status}}</p>
                    <p>Current Location: {{$checkouts->current_location}}</p>
                    <p>Tracking ID: {{$checkouts->tracking_id}}</p>
                    <div class="flex">Tracking ID QR Code: &nbsp;&nbsp;<div id="content">{!! DNS2D::getBarcodeHTML("$checkouts->tracking_id", 'QRCODE', 5, 5, 'black') !!}</div></div>
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" onclick="downloadAsPNG()">Download QR Code</button>
                    <script>
                        function downloadAsPNG() {
                          const content = document.getElementById('content');
                          html2canvas(content, {
                            x: -20, // Adjust canvas position to account for left padding
                            y: -20, // Adjust canvas position to account for top padding
                            width: content.offsetWidth + 40, // Adjust width for padding and border
                            height: content.offsetHeight + 40, // Adjust height for padding and border
                            scale: window.devicePixelRatio * 2 // Adjust scale for better image quality
                            }).then(canvas => {
                            const imgData = canvas.toDataURL('image/png');
                            const link = document.createElement('a');
                            link.href = imgData;
                            link.download = '{{$checkouts->tracking_id}}_QR.png';
                            link.click();
                          });
                        }
                      </script>
                </div>
            </div>

            <div class="p-2">
                <a href="/order">
                    <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
