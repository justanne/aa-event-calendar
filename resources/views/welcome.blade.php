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
  <div class="w-full">
    <div class="w-3/12 absolute top-4 right-4">
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative" role="alert">
        <p class="text-sm">Event saved successfully</p>
      </div>
    </div>
  </div>

  <div class="w-11/12 mx-auto my-10">
    <h1 class="heading-1">Calendar</h1>

    <div class="flex flex-wrap">
      <div class="w-3/12 mt-6">
        <label for="ev-name"> Event
          <input class="block mt-2 w-full" type="text" name="" id="ev-name">
        </label>

        <div class="grid gap-4 grid-cols-2 mt-6">
          <div class="inline-block">
            <label for="ev-from"> From
              <input class="mt-2" type="date" min="2020-10-20" name="" id="ev-from">
            </label>
          </div>
          <div class="inline-block">
            <label for="ev-to"> To
              <input class="mt-2" type="date" min="2020-10-20" name="" id="ev-to">
            </label>
          </div>
        </div>

        <div class="flex flex-wrap mt-6 inp-checkgroup">
          <label for="ev-wk-mon"><input type="checkbox" name="" id="ev-wk-mon">Mon</label>
          <label for="ev-wk-tue"><input type="checkbox" name="" id="ev-wk-tue">Tue</label>
          <label for="ev-wk-wed"><input type="checkbox" name="" id="ev-wk-wed">Wed</label>
          <label for="ev-wk-thu"><input type="checkbox" name="" id="ev-wk-thu">Thu</label>
          <label for="ev-wk-fri"><input type="checkbox" name="" id="ev-wk-fri">Fri</label>
          <label for="ev-wk-sat"><input type="checkbox" name="" id="ev-wk-sat">Sat</label>
          <label for="ev-wk-sun"><input type="checkbox" name="" id="ev-wk-sun">Sun</label>
        </div>

        <div class="mt-6">
          <a href="#" class="btn btn-purple">Save</a>
        </div>
      </div>

      <div class="w-9/12 mt-6 pl-10">
        <h2 class="heading-2 font-bold border-none">October 2020</h2>

        <div class="table w-full table-event">
          <div class="">1 Mon</div>
          <div class="">1 Tue</div>
        </div>
      </div>
    </div>

  </div>
  <script src="{{ asset('js/vendor.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

