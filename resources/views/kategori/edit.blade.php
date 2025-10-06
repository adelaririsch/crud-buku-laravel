@include('layout.header')
<h3>Edit Kategori</h3>
<form action="{{ route('kategori.update', $kategori->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="" value="{{ $kategori->nama_kategori }}">
    <button type="submit" class="tombol">Update</button>
</form>
    
    
@include('layout.footer')