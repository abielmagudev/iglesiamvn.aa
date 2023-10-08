<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
<script>
const clipboard = new ClipboardJS('.clipboard');

clipboard.on('success', (e) => {
	e.clearSelection();
})
</script>
