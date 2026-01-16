{{-- New Blog Footer --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> -->

<script>
    $('[data-toggle="tooltip"]').tooltip()
</script>


<footer class="grid grid-cols-12 grid-rows-[repeat(4, min-content)] w-full" style="background-color: #111827;">




    <!-- Row 1 -->
    <div class="col-span-2 text-white"></div>
    <div class="col-span-4 text-center mt-10">
        <p class="text-white w-full h-auto min-w-[300px]">Project &amp; Process Management Best Practice<br> at CM Level
            2 and above</p>
    </div>
    <div class="col-span-6 text-white"></div>

    <!-- Row 2 -->
    <div class="col-span-2 text-white"></div>
    <div class="col-span-4 text-center">
        <p>
            <a href="/gamestats" target="_blanik">
                <img alt="Up Stat or Down Stat" class="w-full h-auto min-w-[300px]" src="{{ asset('storage/images/devopsimagemedium.png') }}"
                    onmouseover="this.src='{{ asset('storage/images/devops2.gif') }}'" onmouseout="this.src='{{ asset('storage/images/devopsimagemedium.png') }}'"
                    title="How are your game stats? Click here for more">

            </a>
        </p>
    </div>
    <div class="col-span-6 text-white"></div>

    <!-- Row 3 -->
    <div class="col-span-2 text-white"></div>
    <div class="col-span-4 text-center">
        <p class="text-white min-w-[300px]">underpinned by ITIL</p>
    </div>
    <div class="col-span-6 text-white"></div>



    <!-- Row 4 -->
    <div class="col-span-7 text-white"></div>
    <div class="col-span-3 text-center mt-20 mb-20">
        <p class="small text-white">
            <span class="text-white">&copy; 2009 PMWay</span><br>
            <small>People Process Technology Governance Execution</small>
        </p>
    </div>
    <div class="col-span-2 text-white "></div>

</footer>
