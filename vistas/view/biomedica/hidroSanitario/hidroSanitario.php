<script>
  window.addEventListener("offline", (e) => {
  console.log("offline");
});

window.addEventListener("online", (e) => {
  console.log("online");
});

if (navigator.onLine) {
  console.log("online");
} else {
  console.log("offline");
}

</script>