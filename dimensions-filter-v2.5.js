
var millingForm = document.getElementById('milling-dimensions')
if(millingForm) {
 
  millingForm.addEventListener('submit', function(e) {
    // prevent form submit from reloading page
    e.preventDefault()
    
    // create new FormData object based on "this" (millingForm) form
    const formData = new FormData(this)
  
    fetch('/wp-content/themes/storefront-child/products/milling-table.php', {
      method: 'post',
      body: formData 
    }).then(function (response) {
      return response.text()
    }).then(function (text) {
      // console.log(text)
      resultsContainer.innerHTML = text
      let btScript = document.createElement('script')
      let btScript2 = document.createElement('script')
      btScript2.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
      btScript.src = 'https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js'
      document.getElementById('filter-container').appendChild(btScript)
      document.getElementById('filter-container').appendChild(btScript2)
    }).catch(function (error) {
      console.error(error)
    })
  
  })
}


var millingSubForm = document.getElementById('milling-sub-form')
if(millingSubForm) {
  millingSubForm.addEventListener('change', function(e) {
  const formData = new FormData(this)
  console.log('inside millingSubForm event listener')
  //  instaed of posting to filter_queries maybe this should go to /product-filter ?
    fetch('/wp-content/themes/storefront-child/products/filter-content.php', {
      method: 'post',
      body: formData
    }).then(function (response) {
      return response.text()
    }).then(function (text) {
      
      dimensionSelect()
    }).catch(function (error) {
      console.error(error)
    })
  })
}
var threadingSubForm = document.getElementById('threading-sub-form')
if(threadingSubForm) {
  threadingSubForm.addEventListener('change', function(e) {
  const formData = new FormData(this)
  
  console.log('threading sub form change!')
  //  instaed of posting to filter_queries maybe this should go to /product-filter ?
    fetch('/wp-content/themes/storefront-child/products/filter-content.php', {
      method: 'post',
      body: formData
    }).then(function (response) {
      return response.text()
    }).then(function (text) {
      console.log(text)
      dimensionSelect()
    }).catch(function (error) {
      console.error(error)
    })
  })
}
var holemakingSubForm = document.getElementById('holemaking-sub-form')
if(holemakingSubForm) {
  holemakingSubForm.addEventListener('change', function(e) {
  const formData = new FormData(this)
  // console.log('this is changeing')
  //  instaed of posting to filter_queries maybe this should go to /product-filter ?
    fetch('/wp-content/themes/storefront-child/products/filter-content.php', {
      method: 'post',
      body: formData
    }).then(function (response) {
      return response.text()
    }).then(function (text) {
      // console.log(text)
      dimensionSelect()
    }).catch(function (error) {
      console.error(error)
    })
  })
}
var specialtySubForm = document.getElementById('specialty-sub-form')
if(specialtySubForm) {
  specialtySubForm.addEventListener('change', function(e) {
  const formData = new FormData(this)
  console.log('this is changeing')
  //  instaed of posting to filter_queries maybe this should go to /product-filter ?
    fetch('/wp-content/themes/storefront-child/products/filter-content.php', {
      method: 'post',
      body: formData
    }).then(function (response) {
      return response.text()
    }).then(function (text) {
      console.log(text)
      dimensionSelect()
    }).catch(function (error) {
      console.error(error)
    })
  })
}