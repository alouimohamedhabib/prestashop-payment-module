var cbMethod = ()  => {
    fetch('https://jsonplaceholder.typicode.com/todos/1')
  .then(response => response.json())
  .then(json => console.log(json))
  .then(console.log("Hope you are well"))
}

document.addEventListener("DOMContentLoaded" , function () {
    alert()
    document.getElementById("CbBtn").addEventListener('click' , 
    function () {
        cbMethod();
    } )
})