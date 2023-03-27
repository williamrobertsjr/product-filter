const loadText = () => {
    // Create XHR Object
    const xhr = new XMLHttpRequest();
    // OPEN - type, url/file, async
    xhr.open('GET', '/wp-content/themes/storefront-child/products/sample.txt', true)

    xhr.onload = function() {
        if(this.status == 200) {
            
            document.getElementById('text').innerHTML = this.responseText
        }
    }
    // Sends request
    xhr.send()
}

// HTTP STATUSES
// 200: 'OK'
// 403: 'Forbidden'
// 404: 'Not Found'

// document.getElementById('button').addEventListener('click', loadText)
document.getElementById('button').onclick = loadText


