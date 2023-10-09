@push('scripts')
<script>
const autollenarUsuario = {
    inputEmail: document.getElementById('inputCorreoElectronico'),
    inputName: document.getElementById('inputUsuario'),
    listen: function () {
        let self = this

        this.inputEmail.addEventListener('blur', (e) => {
            if( self.inputName.value.trim() == '' )
            {
                self.inputName.value = (e.target.value.split('@'))[0].trim()
            }
        })
    }
}
autollenarUsuario.listen()
</script>    
@endpush
