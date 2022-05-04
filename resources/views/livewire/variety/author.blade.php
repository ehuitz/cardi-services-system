
@section('styles')

@endsection

<div class="flex md:flex-row flex-col antialiased text-gray-800 gap-5">


    <div class="md:w-full overflow-x-hidden min-h-200 sm:w-full mt-3">

        <div class="flex text-base transform transition w-screen md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl">
            <div class="w-screen relative flex bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl">

              <div class="md:w-8/12 sm:w-full grid grid-cols-1 gap-y-8 gap-x-6 items-center sm:grid-cols-12 lg:gap-x-8">
                <div class="aspect-w-2 aspect-h-3 rounded-lg bg-gray-100 overflow-hidden sm:col-span-4 lg:col-span-5">


                    <section class="mx-auto max-w-2xl">
                        <div class="shadow-2xl relative">
                          <!-- large image on slides -->

                          @if (count($images))
                          @foreach ($images as $image)
                          <div class="mySlides hidden">
                            <div class="w-full object-cover">
                                <img src="{{ asset($image['path']) }}" alt="">
                            </div>
                          </div>
                       @endforeach
                       @else
                       <p class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">No images. Upload on using the section on the right</p>
                   @endif
                          <!-- butttons -->
                          <a class="absolute left-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold" onclick="plusSlides(-1)">❮</a>
                          <a class="absolute right-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold" onclick="plusSlides(1)">❯</a>

                          {{-- <!-- image description -->
                          <div class="text-center text-white font-light tracking-wider bg-gray-800 py-2">
                            <p id="caption"></p>
                          </div> --}}

                          <!-- smaller images under description -->
                          <div class="flex">
                            @foreach ($images as $image)

                            <div>
                              <img class="description h-24 opacity-50 hover:opacity-100 cursor-pointer" src="{{ asset($image['path']) }}" onclick="currentSlide({{ asset($image['path']) }})" alt="{{ asset($image['name']) }}">
                            </div>

                            @endforeach
                          </div>
                        </div>
                      </section>




                </div>





                <div class="sm:col-span-8 lg:col-span-7">
                    <h1 class="text-2xl font-extrabold text-gray-900 sm:pr-12">{{$variety->crop->name}}</h1>
                  <h2 class="text-2xl font-extrabold text-gray-900 sm:pr-12">{{$variety->name}}</h2>


                  <section aria-labelledby="options-heading" class="mt-10">
                    <form>
                      <!-- Colors -->
                      <div>


                        <h2 class="mb-3">Name:<b>{{$variety->name}}</b></h2>

                        <h2 class = "mb-3">Origin: <b> {{$variety->origin->institution. ' - '. $variety->origin->country->name}}</b></h2>
                        <h2 class = "mb-3">Crop:<b> {{$variety->crop->name . ' - '. $variety->crop->scientific_name}}</b></h2>
                        <h2 class = "mb-3">Type: <b> {{$variety->type}}</b></h2>
                        <h2 class = "mb-3">Description<b> {{$variety->description}}</b></h2>
                        <h2 class = "mb-3">Use: <b>{{$variety->use}}</b></h2>
                      </div>
                    </form>
                  </section>

                  <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('images.store') }}">
                    @csrf
                    <h2 class="text-gray-800 dark:text-gray-200 mt-5 text-center">Upload an Image</h2>
                    <div>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                    aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex justify-center text-sm text-gray-600">
                                    <input type="text" value="{{ $variety->id }}" class="hidden" name="variety_id">
                                    <label for="file"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-gray-800 dark:text-gray-200 dark:bg-gray-800">
                                        <span>Upload a file</span>
                                        <input id="file" name="file" type="file" class="sr-only">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-300">PNG, JPEG, JPG, GIF, 20MB</p>
                            </div>
                        </div>
                        @error('file')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 dark:bg-gray-700">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm
                        font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-indigo-500">Upload</button>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@if (count($images))
@section('scripts')
<script>
    //JS to switch slides and replace text in bar//
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("description");
    //   var captionText = document.getElementById("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" opacity-100", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " opacity-100";
    //   captionText.innerHTML = dots[slideIndex - 1].alt;
    }
  </script>
@endsection
@endif
