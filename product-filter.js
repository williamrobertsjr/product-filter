let toolTypeSelect = document.getElementById("tool-type")
let selectedToolType = toolTypeSelect.value

let filters = document.querySelectorAll(".filters")


const toolSelect = () => {
  
  selectedToolType = toolTypeSelect.value
  console.log(selectedToolType)
  let filterOptions = document.querySelectorAll(".filter-options")
  
  for (filter of filterOptions) {
    selectedToolType == filter.getAttribute("data-tool-type") ? filter.classList.replace("hide", "show") : filter.classList.replace("show", "hide")
  }
  for(filter of filters) {
    if(selectedToolType !== filter.dataset.toolType) {
      filter.style.display = 'none'
    }
  }
  if(selectedToolType.includes('inserts')) {
    showTable()
  } else {
    document.getElementById('filter-table-container').innerHTML = " ";
  }
}


let subTypeSelect = document.getElementsByClassName('sub-type-select')
let selectedSub = subTypeSelect.value
const dimensionSelect = () => { 
  let filters = document.querySelectorAll(".filters")
  for (select of subTypeSelect) {
    selectedSub = select.value
    
    for (option of select) {
      let subTypeOption = option.classList
      
      let selectedSubType = select.getAttribute('data-tool-type')
      
      if (selectedSubType == selectedToolType) {
        
        for(filter of filters) {
          
          let selectedSubFilter = filter.getAttribute('data-filter')
          let selectedFilterClass = filter.classList
          
          if(typeof filter.dataset.filter !== "undefined" && selectedSubType == selectedToolType && filter.dataset.filter.includes(selectedSub)){
          
            filter.style.display = 'block'
          
          }else {
            filter.style.display = 'none'
          }
        }
      } else {
        for(filter of filters) {
          // console.log(filter)
          if(selectedToolType !== filter.dataset.toolType) {
            filter.style.display = 'none'
          } 
        }
      }
    }
  }
}


let filtersHere = document.getElementById('filtersHere')
let toolTypeForm = document.getElementById('tool-type-form')


toolTypeForm.addEventListener('change', function(e) {
  
  e.preventDefault()
  const formData = new FormData(this)

  fetch('/wp-content/themes/storefront-child/products/filter-content.php', {
    method: 'POST',
    body: formData
  }).then(function (response) {
    return response.text()
  }).then(function (text) {
    filtersHere.innerHTML = text
    let dimensionsScript = document.createElement('script')
    dimensionsScript.src = '/wp-content/themes/storefront-child/products/dimensions-filter-v2.5.js'
    document.getElementById('filter-container').appendChild(dimensionsScript)
    toolSelect()
    // dimensionSelect()
  }).catch(function (error) {
    console.error(error)
  })

})


let resultsContainer = document.getElementById('filter-table-container')

function showTable() {
  // console.log('Button was clicked')
  let xhr = new XMLHttpRequest();
  // OPEN - type, url/file, async (t/f)
  switch (selectedToolType) {
    case 'inserts':
      xhr.open('GET', '/wp-content/themes/storefront-child/products/inserts-table.php', true);
      break;
    case 'holemaking':
      xhr.open('GET', '/wp-content/themes/storefront-child/products/holemaking-table.php', true);
      break;
    case 'threading':
      xhr.open('GET', '/wp-content/themes/storefront-child/products/threading-table.php', true);
      break;
    case 'milling':
      xhr.open('GET', '/wp-content/themes/storefront-child/products/milling-table.php', true);
      break;
    case 'specialty':
      xhr.open('GET', '/wp-content/themes/storefront-child/products/spcialty-table.php', true);
      break;
    default:
      console.log('Default Tool Type in showTable()');
  }
  
   
  xhr.onload = function(){
    if(this.status == 200){
      // console.log(this.responseText)
      resultsContainer.innerHTML = this.responseText
      let btScript = document.createElement('script')
      let btScript2 = document.createElement('script')
      // let jqScript = document.createElement('script')
      // jqScript.src = 'https://code.jquery.com/jquery-3.1.1.min.js'
      btScript.src = 'https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js'
      btScript2.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
      // document.getElementById('filter-container').appendChild(jqScript)
      document.getElementById('filter-container').appendChild(btScript)
      document.getElementById('filter-container').appendChild(btScript2)
      if(btScript) {
        console.log('btScript was created')
      }

    }
  }
  
  xhr.onerror = function(){
    console.log('Request Error...')
  }
  // Sends Request
  xhr.send();

}







// let millingForm = document.getElementById('milling-dimensions')

// if(millingForm) {
//   console.log(millingForm)
//   millingForm.addEventListener('submit', function(e) {
//     // prevent form submit from reloading page
//     e.preventDefault()
    
//     // create new FormData object based on "this" (millingForm) form
//     const formData = new FormData(this)
  
//     fetch('/wp-content/themes/storefront-child/products/milling-table.php', {
//       method: 'post',
//       body: formData 
//     }).then(function (response) {
//       return response.text()
//     }).then(function (text) {
//       // console.log(text)
//       resultsContainer.innerHTML = text
//       let btScript = document.createElement('script')
//       let btScript2 = document.createElement('script')
//       btScript2.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
//       btScript.src = 'https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js'
//       document.getElementById('filter-container').appendChild(btScript)
//       document.getElementById('filter-container').appendChild(btScript2)
//     }).catch(function (error) {
//       console.error(error)
//     })
  
//   })
// }
// let millingSubForm = document.getElementById('milling-sub-form')
// if(millingSubForm) {
//   console.log(millingSubForm)
//   millingSubForm.addEventListener('change', function(e) {
//     const formData = new FormData(this)
//   //  instaed of posting to filter_queries maybe this should go to /product-filter ?
//     fetch('/wp-content/themes/storefront-child/products/filter-content.php', {
//       method: 'post',
//       body: formData
//     }).then(function (response) {
//       return response.text()
//     }).then(function (text) {
//       // resultsContainer.innerHTML = formData.get('tool-type')
//       let milliDia = document.getElementById('milling-dia')
//       // milliDia.innerHTML = text
//     //   resultsContainer.innerHTML = text
//       dimensionSelect()
     
//     }).catch(function (error) {
//       console.error(error)
//     })
//   })
// }

