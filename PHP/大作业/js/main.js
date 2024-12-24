
fetch("admin/api.php", {
  method: "POST",
  body: new URLSearchParams({
    param1: "value1",
    param2: "value2"
  })
})
  .then(response => response.text())
  .then(data => console.log(data))
  .catch(error => console.error("Error:", error));

function name(params) {

}