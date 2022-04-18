<div class="flex md:flex-row flex-col antialiased text-gray-800 gap-2">


    <div class="md:w-full overflow-x-hidden min-h-200 sm:w-full mt-3">

        <div class="flex text-base text-left transform transition w-full md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl">
            <div class="w-full relative flex items-center bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
              {{-- <button type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button> --}}

              <div class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:gap-x-8">
                <div class="aspect-w-2 aspect-h-3 rounded-lg bg-gray-100 overflow-hidden sm:col-span-4 lg:col-span-5">
                  <img src="https://ahsti.com.ph/wp-content/uploads/2019/08/AH-J505-1.png" alt="Two each of gray, white, and black shirts arranged on table." class="object-center object-cover">
                </div>
                <div class="sm:col-span-8 lg:col-span-7">
                    <h1 class="text-2xl font-extrabold text-gray-900 sm:pr-12">CORN</h1>
                  <h2 class="text-2xl font-extrabold text-gray-900 sm:pr-12">{{$variety->name}}</h2>


                  <section aria-labelledby="options-heading" class="mt-10">
                    <h3 id="options-heading" class="sr-only">Product options</h3>

                    <form>
                      <!-- Colors -->
                      <div>


                        <h2 class="mb-3">Average Plant Height:    <b> 210cm</b></h2>

                        <h2 class = "mb-3">Average Days to tasselling:<b> 48 days</b></h2>
                        <h2 class = "mb-3">Average Days to Silking: <b> 52 days</b></h2>
                        <h2 class = "mb-3">Ear Height <b> 125-130cm: </b></h2>
                        <h2 class = "mb-3">Average Days to Maturity:  <b> 110 days</b></h2>
                        <h2 class = "mb-3">Yield Potential: <b>Between 1360kg to 1810kg in optimal conditions </b></h2>
                        <h2 class = "mb-3">Color of Seed:</h2>

                        <fieldset class="mt-4 mb-2">
                          <div class="flex items-center space-x-3">
                            <!--
                              Active and Checked: "ring ring-offset-1"
                              Not Active and Checked: "ring-2"
                            -->
                            <label class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-900">
                              <input type="radio" name="color-choice" value="Yellow" class="sr-only" aria-labelledby="color-choice-2-label">
                              <p id="color-choice-2-label" class="sr-only">Yellow</p>
                              <span aria-hidden="true" class="h-8 w-8 bg-yellow-300 border border-black border-opacity-10 rounded-full"></span>
                            </label>
                          </div>
                        </fieldset>

                      </div>
                    </form>
                  </section>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
