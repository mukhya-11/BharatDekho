<style>
    /* Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#fffaf3;
}

/* Page */
.upload-page{
    min-height:100vh;
    padding:120px 20px 60px;
    background:linear-gradient(135deg,#fff7ed,#fff1cc,#fde68a);
    display:flex;
    justify-content:center;
    align-items:center;
    position:relative;
    overflow:hidden;
}

/* Background blobs */
.blob{
    position:absolute;
    border-radius:50%;
    filter:blur(60px);
    opacity:.35;
    animation:float 8s ease-in-out infinite;
}

.blob-1{
    width:260px;
    height:260px;
    background:#fb923c;
    top:40px;
    left:-70px;
}

.blob-2{
    width:320px;
    height:320px;
    background:#fbbf24;
    bottom:-80px;
    right:-80px;
    animation-delay:2s;
}

@keyframes float{
    0%,100%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(-25px);
    }
}

/* Card */
.upload-card{
    width:100%;
    max-width:720px;
    background:rgba(255,255,255,.82);
    backdrop-filter:blur(14px);
    border:1px solid rgba(255,255,255,.5);
    border-radius:30px;
    padding:40px;
    box-shadow:0 20px 45px rgba(251,146,60,.25);
    position:relative;
    z-index:2;
    transition:.4s ease;
}

.upload-card:hover{
    transform:translateY(-4px);
    box-shadow:0 25px 60px rgba(249,115,22,.3);
}

/* Header */
.title-section{
    text-align:center;
    margin-bottom:30px;
}

.badge{
    display:inline-block;
    background:#fff3df;
    color:#ea580c;
    padding:8px 18px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    margin-bottom:15px;
}

.title-section h1{
    font-size:38px;
    font-weight:800;
    color:#ea580c;
    margin-bottom:10px;
}

.title-section p{
    color:#6b7280;
    line-height:1.6;
}

/* Alerts */
.alert{
    padding:14px 18px;
    border-radius:14px;
    margin-bottom:22px;
    font-size:15px;
}

.success{
    background:#ecfdf5;
    color:#047857;
    border-left:5px solid #10b981;
}

.error{
    background:#fff1f2;
    color:#b91c1c;
    border-left:5px solid #ef4444;
}

.error ul{
    margin-left:20px;
}

/* Form */
form{
    display:flex;
    flex-direction:column;
    gap:22px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

label{
    margin-bottom:8px;
    font-weight:600;
    color:#374151;
}

input,
select,
textarea{
    width:100%;
    padding:15px 18px;
    border:2px solid #fcd9b6;
    border-radius:16px;
    background:#fffdfb;
    font-size:15px;
    color:#374151;
    transition:.3s ease;
}

input::placeholder,
textarea::placeholder{
    color:#9ca3af;
}

input:focus,
select:focus,
textarea:focus{
    outline:none;
    border-color:#fb923c;
    background:white;
    box-shadow:0 0 0 5px rgba(251,146,60,.15);
    transform:translateY(-1px);
}

textarea{
    resize:none;
}

small{
    margin-top:8px;
    color:#6b7280;
    font-size:13px;
}

/* Submit Button */
.upload-btn{
    margin-top:12px;
    background:linear-gradient(135deg,#f97316,#ea580c);
    color:white;
    border:none;
    padding:16px;
    font-size:17px;
    font-weight:700;
    border-radius:18px;
    cursor:pointer;
    transition:.3s ease;
    box-shadow:0 12px 24px rgba(249,115,22,.35);
}

.upload-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 30px rgba(234,88,12,.45);
}

.upload-btn:active{
    transform:scale(.98);
}

/* Responsive */
@media(max-width:640px){

    .upload-page{
        padding:100px 15px 40px;
    }

    .upload-card{
        padding:28px 22px;
        border-radius:24px;
    }

    .title-section h1{
        font-size:30px;
    }

    input,
    select,
    textarea{
        padding:14px;
    }

}
</style>

<div class="upload-page">

    <!-- Background Decoration -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="upload-card">

        <div class="title-section">
            <span class="badge">🇮🇳 BharatDekho</span>

            <h1>Upload Data</h1>

            <p>
                Add festivals, heritage sites, culture, or history entries directly into BharatDekho.
            </p>
        </div>

        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('upload.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Select State</label>
                <select name="state_id">
                    <option value="">Choose a State</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Select Category</label>
                <select name="category">
                    <option value="">Choose Category</option>
                    <option value="festival">Festival</option>
                    <option value="heritage">Heritage</option>
                    <option value="culture">Culture</option>
                    <option value="history">History</option>
                </select>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" maxlength="255" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="image_url" placeholder="assam/image.jpg">
            </div>

            <div class="form-group">
                <label>Description (Max 1000 characters)</label>
                <textarea name="description" rows="6" maxlength="1000" placeholder="Write description..."></textarea>

                <small>Maximum 1000 characters.</small>
            </div>

            <button type="submit" class="upload-btn">
                🚀 Upload Data
            </button>
        </form>

    </div>
</div>

<script>
window.addEventListener("pageshow", function (event) {
    if (event.persisted || performance.getEntriesByType("navigation")[0]?.type === "back_forward") {
        document.querySelector("form").reset();
        window.location.href = "{{ route('upload.create') }}";
    }
});
</script>
