<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar Event</title>
  <link rel="icon shortcut" href="{{ asset('') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div id="app">
    <div class="w-7/12 md:w-4/12 lg:w-3/12 absolute top-4 right-4">
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative" role="alert">
        <p class="text-sm">Event saved successfully</p>
      </div>
    </div>

    <div class="w-11/12 mx-auto my-10">
      <h1 class="heading-1">Calendar</h1>

      <div class="flex flex-wrap">
        <div class="w-full lg:w-3/12 mt-6">
          <Event-Name
            label="Event"
            name="ev-name"
          ></Event-Name>

          <div class="grid gap-4 lg:grid-cols-2 mt-6">
            @php
              $firstday_month = date('Y-m-d', mktime(0,0,0, date('m'), date('d', 1), date('Y')));
              $endday_month = date('Y-m-t');
            @endphp
            <div class="inline-block">
              <Input-Date
                min="{{ $firstday_month }}"
                max="{{ $endday_month }}"
                label="From"
                name="ev-from"
              ></Input-Date>
            </div>
            <div class="inline-block">
              <Input-Date
                min="{{ $firstday_month }}"
                max="{{ $endday_month }}"
                label="To"
                name="ev-to"
              ></Input-Date>
            </div>
          </div>

          <Input-Checkbox-Group
            :checkboxes="[
              'Mon',
              'Tue',
              'Wed',
              'Thu',
              'Fri',
              'Sat',
              'Sun',
            ]"
            name="ev-wk"
          ></Input-Checkbox-Group>

          <div class="mt-6">
            <a href="#" class="btn btn-purple">Save</a>
          </div>
        </div>

        <div class="w-full lg:w-9/12 mt-10 lg:mt-6 lg:pl-10">
          <h2 class="heading-2 font-bold border-none">October 2020</h2>

          <div class="table w-full table-event">
            <div class="">1 Mon</div>
            <div class="">1 Tue</div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script src="{{ asset('js/manifest.js') }}"></script>
  <script src="{{ asset('js/vendor.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

