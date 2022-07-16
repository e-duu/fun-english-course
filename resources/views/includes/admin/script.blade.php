{{-- @php
  $orderDetails = App\Models\Student::where('status', 'paid')->where('updated_at', Carbon\Carbon::now())->latest()->take(20)->get();
@endphp

@if ($orderDetails)
<div  class="fixed" style="right: 12px; bottom: 4px; z-index: 9000" style="direction: none">
  <div id="notification" class="bg-green-500 shadow-lg w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
    <div class="bg-green-500 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-green-400 rounded-t-lg">
      <p class="font-bold text-white flex items-center">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
        </svg>
        <span id="order-name"></span>, Success Payment
      </p>
      <div class="flex items-center">
        <button onclick="closeOrder()" class="position-absolute btn text-secondary" style="right: 0px; top: 0px">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="p-3 bg-green-500 rounded-b-lg break-words text-white">
      <p id="order-item"></p>
      <p id="order-date"></p>
    </div>
  </div>
</div>
@endif


<script>
  var orders = [
        @foreach ($orderDetails as $detail)
            @php
                  $item = $detail->level->program->name.' - '.$detail->level->name;
            @endphp
            {
                  user : "{{$detail->student->name}}",
                  item : "{{$item}}",
                  date : '{{\Carbon\Carbon::create($detail->updated_at)->format('d-m-Y H:i')}}',
            },
        @endforeach
  ]
  
  function random_item(items)
      {
            return items[Math.floor(Math.random()*items.length)];    
      }

      var myElement = document.getElementById('notification');
      
    function closeOrder()
    {
          return myElement.style["display"]="none";   
    }

    setInterval(function(){
          var randIndex = random_item(orders)
          console.log(randIndex)

          document.getElementById('order-name').innerHTML = randIndex.user;
          document.getElementById('order-item').innerHTML = randIndex.item;
          document.getElementById('order-date').innerHTML = randIndex.date;

          if(myElement.style["display"]=="none"){
              myElement.style["display"]="block";
          }
          else
          {
              myElement.style["display"]="none";
          }
    },10000);
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="/js/script.js"></script>
<script>
  const setup = () => {
    const getTheme = () => {
      if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'))
      }

      return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
    }

    const setTheme = (value) => {
      window.localStorage.setItem('dark', value)
    }

    const getColor = () => {
      if (window.localStorage.getItem('color')) {
        return window.localStorage.getItem('color')
      }
      return 'cyan'
    }

    const setColors = (color) => {
      const root = document.documentElement
      root.style.setProperty('--color-primary', `var(--color-${color})`)
      root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
      root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
      root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
      root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
      root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
      root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
      this.selectedColor = color
      window.localStorage.setItem('color', color)
      //
    }

    const updateBarChart = (on) => {
      const data = {
        data: randomData(),
        backgroundColor: 'rgb(207, 250, 254)',
      }
      if (on) {
        barChart.data.datasets.push(data)
        barChart.update()
      } else {
        barChart.data.datasets.splice(1)
        barChart.update()
      }
    }

    const updateDoughnutChart = (on) => {
      const data = random()
      const color = 'rgb(207, 250, 254)'
      if (on) {
        doughnutChart.data.labels.unshift('Seb')
        doughnutChart.data.datasets[0].data.unshift(data)
        doughnutChart.data.datasets[0].backgroundColor.unshift(color)
        doughnutChart.update()
      } else {
        doughnutChart.data.labels.splice(0, 1)
        doughnutChart.data.datasets[0].data.splice(0, 1)
        doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
        doughnutChart.update()
      }
    }

    const updateLineChart = () => {
      lineChart.data.datasets[0].data.reverse()
      lineChart.update()
    }

    return {
      loading: true,
      isDark: getTheme(),
      toggleTheme() {
        this.isDark = !this.isDark
        setTheme(this.isDark)
      },
      setLightTheme() {
        this.isDark = false
        setTheme(this.isDark)
      },
      setDarkTheme() {
        this.isDark = true
        setTheme(this.isDark)
      },
      color: getColor(),
      selectedColor: 'cyan',
      setColors,
      toggleSidbarMenu() {
        this.isSidebarOpen = !this.isSidebarOpen
      },
      isSettingsPanelOpen: false,
      openSettingsPanel() {
        this.isSettingsPanelOpen = true
        this.$nextTick(() => {
          this.$refs.settingsPanel.focus()
        })
      },
      isNotificationsPanelOpen: false,
      openNotificationsPanel() {
        this.isNotificationsPanelOpen = true
        this.$nextTick(() => {
          this.$refs.notificationsPanel.focus()
        })
      },
      isSearchPanelOpen: false,
      openSearchPanel() {
        this.isSearchPanelOpen = true
        this.$nextTick(() => {
          this.$refs.searchInput.focus()
        })
      },
      isMobileSubMenuOpen: false,
      openMobileSubMenu() {
        this.isMobileSubMenuOpen = true
        this.$nextTick(() => {
          this.$refs.mobileSubMenu.focus()
        })
      },
      isMobileMainMenuOpen: false,
      openMobileMainMenu() {
        this.isMobileMainMenuOpen = true
        this.$nextTick(() => {
          this.$refs.mobileMainMenu.focus()
        })
      },
      updateBarChart,
      updateDoughnutChart,
      updateLineChart,
    }
  }
</script>