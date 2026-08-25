// ============================================
// SCREEN SYSTEM
// ============================================

const screens = {
    welcome: document.getElementById("welcomeScreen"),
    frame: document.getElementById("frameScreen"),
    ready: document.getElementById("readyScreen"),
    camera: document.getElementById("cameraScreen"),
    result: document.getElementById("resultScreen"),
    qr: document.getElementById("qrScreen")
};

// ============================================
// BUTTON & ELEMENTS
// ============================================

const startWelcomeBtn = document.getElementById("startWelcomeBtn");
const continueFrameBtn = document.getElementById("continueFrameBtn");
const readyButton = document.getElementById("readyButton");
const takePhotoBtn = document.getElementById("takePhotoBtn");
const continuePhotoBtn = document.getElementById("continuePhotoBtn");
const qrButton = document.getElementById("qrButton");
const restartButton = document.getElementById("restartButton");
const qrBackButton = document.getElementById("qrBackButton");
const photoCountInfo = document.getElementById("photoCountInfo");
const backToFrameBtn = document.getElementById("backToFrameBtn");
const downloadButton = document.getElementById("downloadButton");

const video = document.getElementById("video");
const cameraStatus = document.getElementById("cameraStatus");
const statusDot = document.querySelector(".status-dot");
const countdown = document.getElementById("countdown");
const photoCounter = document.getElementById("photoCounter");
const flash = document.getElementById("flash");
const capturedPreview = document.getElementById("capturedPreview");
const capturedImage = document.getElementById("capturedImage");

const canvas = document.createElement("canvas");

// Cache untuk menyimpan frame transparan yang sudah diproses di memori
const transparentFrameCache = {};

// ============================================
// DATA PHOTOBOOTH
// ============================================

let TOTAL_PHOTOS = 0;
const COUNTDOWN_SECONDS = 3;

let capturedPhotos = [];
let currentPhotoData = null;
let activeSlotIndex = 0;
let selectedFrame = null;
let cameraStream = null;

// ============================================
// FRAME DATA
// ============================================

const frameData = [
    {
        id: 1,
        name: "Frame 1",
        image: "assets/frame/frame1.png",
        photoCount: 6,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 61,  y: 425, width: 388, height: 334 },
                { x: 622, y: 400, width: 389, height: 334 },
                { x: 63,  y: 868, width: 389, height: 334 },
                { x: 623, y: 848, width: 388, height: 334 },
                { x: 63,  y: 1314, width: 389, height: 334 },
                { x: 627, y: 1298, width: 389, height: 334 }
            ]
        }
    },
    {
        id: 2,
        name: "Frame 2",
        image: "assets/frame/frame2.png",
        photoCount: 6,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                // KOORDINAT KHUSUS FRAME 2 (Presisi ke area putih retro window)
                // Kolom Kiri
                { x: 70, y: 288, width: 400, height: 285 },
                { x: 70, y: 752, width: 400, height: 285 },
                { x: 70, y: 1216, width: 400, height: 285 },
                // Kolom Kanan
                { x: 610, y: 288, width: 400, height: 285 },
                { x: 610, y: 752, width: 400, height: 285 },
                { x: 610, y: 1216, width: 400, height: 285 }
            ]
        }
    },
    {
        id: 3,
        name: "Frame 3",
        image: "assets/frame/frame3.png",
        photoCount: 8,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 48,  y: 94,   width: 435, height: 332, rotate: -4 },
                { x: 594, y: 90,   width: 434, height: 336, rotate: 3 },
                { x: 63,  y: 516,  width: 429, height: 321, rotate: 5 },
                { x: 591, y: 482,  width: 435, height: 336, rotate: -3 },
                { x: 60,  y: 907,  width: 435, height: 336, rotate: -3 },
                { x: 603, y: 901,  width: 432, height: 342, rotate: 4 },
                { x: 55,  y: 1321, width: 437, height: 340, rotate: 4 },
                { x: 597, y: 1364, width: 429, height: 321, rotate: -2 }
            ]
        }
    },
    {
        id: 4,
        name: "Frame 4",
        image: "assets/frame/frame4.png",
        photoCount: 8,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 73,  y: 84,   width: 394, height: 298 },
                { x: 613, y: 86,   width: 392, height: 296 },
                { x: 73,  y: 463,  width: 394, height: 300 },
                { x: 613, y: 465,  width: 390, height: 298 },
                { x: 73,  y: 842,  width: 394, height: 298 },
                { x: 613, y: 842,  width: 390, height: 298 },
                { x: 73,  y: 1221, width: 394, height: 296 },
                { x: 611, y: 1221, width: 392, height: 296 }
            ]
        }
    },
    {
        id: 5,
        name: "Frame 5",
        image: "assets/frame/frame5.png",
        photoCount: 8,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 73,  y: 84,   width: 394, height: 298 },
                { x: 613, y: 86,   width: 392, height: 296 },
                { x: 73,  y: 463,  width: 394, height: 300 },
                { x: 613, y: 465,  width: 390, height: 298 },
                { x: 73,  y: 842,  width: 394, height: 298 },
                { x: 613, y: 842,  width: 390, height: 298 },
                { x: 73,  y: 1221, width: 394, height: 296 },
                { x: 611, y: 1221, width: 392, height: 296 }
            ]
        }
    },
    {
        id: 6,
        name: "Frame 6",
        image: "assets/frame/frame6.png",
        photoCount: 4,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 52,  y: 531,  width: 418, height: 420, shape: "circle" },
                { x: 596, y: 531,  width: 418, height: 420, shape: "circle" },
                { x: 54,  y: 1358, width: 418, height: 420, shape: "circle" },
                { x: 624, y: 1339, width: 420, height: 420, shape: "circle" }
            ]
        }
    },
    {
        id: 7,
        name: "Frame 7",
        image: "assets/frame/frame7.png",
        photoCount: 6,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 167, y: 22,   width: 313, height: 313, shape: "circle" },
                { x: 619, y: 41,   width: 332, height: 336, shape: "circle" },
                { x: 161, y: 694,  width: 313, height: 313, shape: "circle" },
                { x: 606, y: 712,  width: 321, height: 332, shape: "circle" },
                { x: 131, y: 1342, width: 328, height: 326, shape: "circle" },
                { x: 652, y: 1342, width: 328, height: 326, shape: "circle" }
            ]
        }
    },
    {
        id: 8,
        name: "Frame 8",
        image: "assets/frame/frame8.png",
        photoCount: 2,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 131, y: 480, width: 278, height: 281, shape: "circle" },
                { x: 673, y: 885, width: 274, height: 272, shape: "circle" }
            ]
        }
    },
    {
        id: 9,
        name: "Frame 9",
        image: "assets/frame/frame9.png",
        photoCount: 6,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 62,  y: 376, width: 451, height: 337 },
                { x: 571, y: 378, width: 470, height: 323 },
                { x: 48,  y: 803, width: 463, height: 318 },
                { x: 571, y: 791, width: 468, height: 335 },
                { x: 62,  y: 1216, width: 451, height: 330 },
                { x: 574, y: 1213, width: 463, height: 332 }
            ]
        }
    },
    {
        id: 10,
        name: "Frame 10",
        image: "assets/frame/frame10.png",
        photoCount: 6,
        config: {
            width: 1080,
            height: 1920,
            photos: [
                { x: 96,  y: 278, width: 364, height: 362 },
                { x: 632, y: 418, width: 364, height: 364 },
                { x: 96,  y: 705, width: 364, height: 362 },
                { x: 632, y: 849, width: 364, height: 364 },
                { x: 98,  y: 1131, width: 362, height: 362 },
                { x: 632, y: 1282, width: 364, height: 364 }
            ]
        }
    }
];

// ============================================
// UTILS & TOAST HELPER
// ============================================

let currentToastTimeout = null;

function showToast(message, icon = '💡', duration = 0) {
    let toastElem = document.getElementById("toastNotification");
    let toastMsg = document.getElementById("toastMessage");
    let toastIcn = document.getElementById("toastIcon");

    if (!toastElem) return;

    if (currentToastTimeout) {
        clearTimeout(currentToastTimeout);
        currentToastTimeout = null;
    }

    if (toastMsg) toastMsg.textContent = message;
    if (toastIcn) toastIcn.textContent = icon;

    toastElem.classList.remove("hidden");

    if (duration > 0) {
        currentToastTimeout = setTimeout(() => {
            toastElem.classList.add("hidden");
        }, duration);
    }
}

function showScreen(screenName) {
    Object.values(screens).forEach(screen => {
        if (screen) screen.classList.remove("active");
    });
    if (screens[screenName]) {
        screens[screenName].classList.add("active");
    }
}

function wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

// ============================================
// AUTO CUTOUT WHITE HELPER
// ============================================

async function getProcessedFrameImage(frameSrc, width, height) {
    if (transparentFrameCache[frameSrc]) {
        return transparentFrameCache[frameSrc];
    }

    const rawImg = await loadImage(frameSrc);
    const tempCanvas = document.createElement("canvas");
    tempCanvas.width = width;
    tempCanvas.height = height;
    const tCtx = tempCanvas.getContext("2d");

    tCtx.drawImage(rawImg, 0, 0, width, height);

    const imgData = tCtx.getImageData(0, 0, width, height);
    const data = imgData.data;

    for (let i = 0; i < data.length; i += 4) {
        const r = data[i];
        const g = data[i + 1];
        const b = data[i + 2];
        if (r > 230 && g > 230 && b > 230) {
            data[i + 3] = 0; // Transparan
        }
    }

    tCtx.putImageData(imgData, 0, 0);

    const processedImg = new Image();
    processedImg.src = tempCanvas.toDataURL("image/png");
    await new Promise(res => processedImg.onload = res);

    transparentFrameCache[frameSrc] = processedImg;
    return processedImg;
}

// ============================================
// RENDER & SELECT FRAME
// ============================================

function renderFrames() {
    const frameList = document.getElementById("frameList");
    if (!frameList) return;
    frameList.innerHTML = "";

    frameData.forEach(frame => {
        const card = document.createElement("div");
        card.className = "frame-card";
        card.dataset.frameId = frame.id;

        let previewHTML = frame.image ? 
            `<img src="${frame.image}" style="width:100%; height:100%; object-fit:contain; border-radius:12px;">` :
            `<div class="frame-placeholder">📸</div>`;

        card.innerHTML = `${previewHTML}<div class="frame-name">${frame.name}</div>`;
        card.addEventListener("click", () => selectFrame(frame.id));
        frameList.appendChild(card);
    });
}

function selectFrame(frameId) {
    selectedFrame = frameData.find(frame => frame.id === frameId);
    activeSlotIndex = 0;
    capturedPhotos = [];
    currentPhotoData = null;
    TOTAL_PHOTOS = selectedFrame.photoCount;
    
    if (photoCountInfo) {
        photoCountInfo.textContent = `Kamu akan mengambil ${TOTAL_PHOTOS} foto. Klik slot pada preview untuk memilih urutan.`;
    }

    document.querySelectorAll(".frame-card").forEach(card => card.classList.remove("selected"));
    const selectedCard = document.querySelector(`[data-frame-id="${frameId}"]`);
    if (selectedCard) selectedCard.classList.add("selected");

    if (continueFrameBtn) {
        continueFrameBtn.disabled = false;
        continueFrameBtn.textContent = "PILIH FRAME INI";
    }

    showToast(`${selectedFrame.name} dipilih (${TOTAL_PHOTOS} slot foto). Klik 'PILIH FRAME INI' untuk melanjutkan.`, '🖼️', 0);
}

if (continueFrameBtn) {
    continueFrameBtn.addEventListener("click", () => {
        if (!selectedFrame) return;
        showSelectedFrame();
        showScreen("ready");
        showToast("Klik tombol 'SIAP AMBIL FOTO' untuk mengaktifkan kamera.", '✨', 0);
    });
}

if (backToFrameBtn) {
    backToFrameBtn.addEventListener("click", () => {
        showScreen("frame");
        showToast("Pilih frame foto yang kamu inginkan.", '🖼️', 0);
    });
}

function showSelectedFrame() {
    const preview = document.getElementById("selectedFramePreview");
    if (!preview) return;
    if (selectedFrame && selectedFrame.image) {
        preview.innerHTML = `<img src="${selectedFrame.image}">`;
    }
}

// ============================================
// CAMERA LOGIC
// ============================================

if (readyButton) {
    readyButton.addEventListener("click", async () => {
        readyButton.disabled = true;
        showScreen("camera");
        await startCamera();
        updatePhotoCounter();
        await updateLiveFrame();
    });
}

async function startCamera() {
    if (cameraStream) return;

    try {
        cameraStream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: "user", width: { ideal: 1280 }, height: { ideal: 720 } },
            audio: false
        });
        video.srcObject = cameraStream;
        if (cameraStatus) cameraStatus.querySelector("span:last-child").textContent = "Kamera siap digunakan";
        if (statusDot) statusDot.style.background = "#2ecc71";
        if (takePhotoBtn) takePhotoBtn.disabled = false;
        
        showToast("Kamera aktif! Klik tombol 'AMBIL FOTO' saat kamu siap.", '📸', 0);
    } catch (error) {
        console.error("Camera Access Error:", error);
        showToast("Kamera tidak dapat diakses! Pastikan Anda telah mengizinkan (Allow) akses kamera.", '❌', 0);
        alert("Kamera tidak dapat diakses! Mohon pastikan Anda telah mengizinkan (Allow) akses kamera pada pop-up browser atau membuka website menggunakan HTTPS.");
        if (cameraStatus) cameraStatus.querySelector("span:last-child").textContent = "Akses kamera ditolak";
        if (statusDot) statusDot.style.background = "#e74c3c";
    }
}

function updatePhotoCounter() {
    if (!photoCounter) return;
    const isFilled = capturedPhotos[activeSlotIndex] ? " (Retake)" : "";
    photoCounter.textContent = `Slot ${activeSlotIndex + 1} / ${TOTAL_PHOTOS}${isFilled}`;
    photoCounter.style.opacity = "1";
}

async function startCountdown() {
    if (!countdown) return;
    for (let number = COUNTDOWN_SECONDS; number >= 1; number--) {
        showToast(`Bersiap! Foto dalam ${number}...`, '⏳', 0);
        countdown.textContent = number;
        countdown.style.transform = "translate(-50%, -50%) scale(1.2)";
        await wait(150);
        countdown.style.transform = "translate(-50%, -50%) scale(1)";
        await wait(850);
    }
    countdown.textContent = "";
    showToast("CHEESE! 📸", '✨', 1000);
}

function capturePhoto() {
    if (!video || !video.videoWidth) return null;
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const context = canvas.getContext("2d");
    context.save();
    context.scale(-1, 1);
    context.drawImage(video, -canvas.width, 0, canvas.width, canvas.height);
    context.restore();
    return canvas.toDataURL("image/jpeg", 0.95);
}

async function cameraFlash() {
    if (!flash) return;
    flash.classList.remove("active");
    void flash.offsetWidth;
    flash.classList.add("active");
    await wait(350);
    flash.classList.remove("active");
}

if (takePhotoBtn) {
    takePhotoBtn.addEventListener("click", startTakingPhoto);
}

async function startTakingPhoto() {
    if (takePhotoBtn) takePhotoBtn.disabled = true;
    if (capturedPreview) capturedPreview.classList.remove("active");
    if (continuePhotoBtn) continuePhotoBtn.classList.remove("active");

    await startCountdown();
    const photo = capturePhoto();
    if (!photo) {
        if (takePhotoBtn) takePhotoBtn.disabled = false;
        showToast("Gagal mengambil gambar!", '❌', 0);
        alert("Gagal mengambil gambar dari kamera.");
        return;
    }

    currentPhotoData = photo;
    await cameraFlash();
    await showCapturedPhoto(photo);
}

async function showCapturedPhoto(photo) {
    if (capturedImage) capturedImage.src = photo;
    if (capturedPreview) capturedPreview.classList.add("active");
    if (continuePhotoBtn) continuePhotoBtn.classList.add("active");
    if (takePhotoBtn) takePhotoBtn.style.display = "none";

    await updateLiveFrame();

    showToast("Selesai dipotret! Klik 'LANJUTKAN' atau klik foto di atas untuk retake.", '👌', 0);
}

if (capturedPreview) {
    capturedPreview.addEventListener("click", performRetake);
}

function performRetake() {
    currentPhotoData = null;
    if (capturedPreview) capturedPreview.classList.remove("active");
    if (continuePhotoBtn) continuePhotoBtn.classList.remove("active");
    if (takePhotoBtn) {
        takePhotoBtn.style.display = "inline-flex";
        takePhotoBtn.disabled = false;
    }
    updateLiveFrame();
    showToast("Retake aktif. Klik 'AMBIL FOTO' untuk mengambil ulang gambar.", '🔄', 0);
}

if (continuePhotoBtn) {
    continuePhotoBtn.addEventListener("click", async () => {
        if (!currentPhotoData) return;

        capturedPhotos[activeSlotIndex] = currentPhotoData;
        currentPhotoData = null;

        if (capturedPreview) capturedPreview.classList.remove("active");
        continuePhotoBtn.classList.remove("active");

        let nextEmpty = -1;
        for (let i = 0; i < TOTAL_PHOTOS; i++) {
            if (!capturedPhotos[i]) {
                nextEmpty = i;
                break;
            }
        }

        if (nextEmpty !== -1) {
            activeSlotIndex = nextEmpty;
            updatePhotoCounter();
            await updateLiveFrame();
            if (takePhotoBtn) {
                takePhotoBtn.style.display = "inline-flex";
                takePhotoBtn.disabled = false;
            }
            showToast(`Foto tersimpan! Sekarang mengambil gambar untuk Slot ${activeSlotIndex + 1}.`, '✅', 0);
        } else {
            await updateLiveFrame();
            finishPhotos();
        }
    });
}

// ============================================
// DRAWING HELPER MASKING + ROTASI
// ============================================

async function drawPhotoToCanvas(ctx, photo, x, y, width, height, shape = "rect", rotateDeg = 0) {
    const image = await loadImage(photo);
    const imageRatio = image.width / image.height;
    const targetRatio = width / height;

    let sourceWidth = image.width;
    let sourceHeight = image.height;
    let sourceX = 0;
    let sourceY = 0;

    if (imageRatio > targetRatio) {
        sourceWidth = image.height * targetRatio;
        sourceX = (image.width - sourceWidth) / 2;
    } else {
        sourceHeight = image.width / targetRatio;
        sourceY = (image.height - sourceHeight) / 2;
    }

    ctx.save();

    if (rotateDeg !== 0) {
        const centerX = x + width / 2;
        const centerY = y + height / 2;
        ctx.translate(centerX, centerY);
        ctx.rotate((rotateDeg * Math.PI) / 180);
        ctx.translate(-centerX, -centerY);
    }

    ctx.beginPath();

    if (shape === "circle") {
        const centerX = x + width / 2;
        const centerY = y + height / 2;
        const radius = Math.min(width, height) / 2;
        ctx.arc(centerX, centerY, radius, 0, Math.PI * 2);
        ctx.clip();
    } else {
        ctx.rect(x, y, width, height);
        ctx.clip();
    }

    ctx.drawImage(image, sourceX, sourceY, sourceWidth, sourceHeight, x, y, width, height);
    ctx.restore();
}

function loadImage(src) {
    return new Promise((resolve, reject) => {
        const image = new Image();
        image.onload = () => resolve(image);
        image.onerror = () => reject(new Error("Gagal memuat gambar: " + src));
        image.src = src;
    });
}

// ============================================
// LIVE FRAME RENDER
// ============================================

async function updateLiveFrame() {
    const liveFrame = document.getElementById("liveFrame");
    if (!selectedFrame || !liveFrame) return;

    const config = selectedFrame.config;
    const previewCanvas = document.createElement("canvas");
    previewCanvas.width = config.width;
    previewCanvas.height = config.height;
    const ctx = previewCanvas.getContext("2d");

    for (let i = 0; i < config.photos.length; i++) {
        const photo = (i === activeSlotIndex && currentPhotoData) ? currentPhotoData : capturedPhotos[i];
        const position = config.photos[i];
        
        if (photo) {
            await drawPhotoToCanvas(
                ctx, 
                photo, 
                position.x, 
                position.y, 
                position.width, 
                position.height, 
                position.shape || "rect",
                position.rotate || 0
            );
        }
    }

    if (selectedFrame.image) {
        try {
            const frameImg = await getProcessedFrameImage(selectedFrame.image, config.width, config.height);
            ctx.drawImage(frameImg, 0, 0, config.width, config.height);
        } catch (err) {
            console.warn("Frame image preview load failed:", err);
        }
    }

    for (let i = 0; i < config.photos.length; i++) {
        if (i === activeSlotIndex) {
            const position = config.photos[i];
            ctx.save();
            if (position.rotate) {
                const centerX = position.x + position.width / 2;
                const centerY = position.y + position.height / 2;
                ctx.translate(centerX, centerY);
                ctx.rotate((position.rotate * Math.PI) / 180);
                ctx.translate(-centerX, -centerY);
            }

            ctx.strokeStyle = "#2563eb";
            ctx.lineWidth = 12;
            if (position.shape === "circle") {
                ctx.beginPath();
                ctx.arc(position.x + position.width / 2, position.y + position.height / 2, position.width / 2, 0, Math.PI * 2);
                ctx.stroke();
            } else {
                ctx.strokeRect(position.x, position.y, position.width, position.height);
            }
            ctx.restore();
        }
    }

    liveFrame.innerHTML = "";
    previewCanvas.style.width = "100%";
    previewCanvas.style.height = "100%";
    previewCanvas.style.objectFit = "contain";
    previewCanvas.style.display = "block";
    previewCanvas.style.cursor = "pointer";

    previewCanvas.onclick = (e) => {
        const rect = previewCanvas.getBoundingClientRect();
        const scaleX = config.width / rect.width;
        const scaleY = config.height / rect.height;

        const clickX = (e.clientX - rect.left) * scaleX;
        const clickY = (e.clientY - rect.top) * scaleY;

        config.photos.forEach((pos, idx) => {
            if (
                clickX >= pos.x && 
                clickX <= pos.x + pos.width && 
                clickY >= pos.y && 
                clickY <= pos.y + pos.height
            ) {
                activeSlotIndex = idx;
                updatePhotoCounter();
                updateLiveFrame();
                
                if (takePhotoBtn) {
                    takePhotoBtn.style.display = "inline-flex";
                    takePhotoBtn.disabled = false;
                }
                if (capturedPreview) capturedPreview.classList.remove("active");
                if (continuePhotoBtn) continuePhotoBtn.classList.remove("active");

                showToast(`Target berpindah ke Slot ${activeSlotIndex + 1}.`, '🎯', 0);
            }
        });
    };

    liveFrame.appendChild(previewCanvas);
}

// ============================================
// FINAL COMPOSITING
// ============================================

async function createFinalPhoto() {
    if (!selectedFrame) return null;
    const config = selectedFrame.config;
    const finalCanvas = document.createElement("canvas");
    finalCanvas.width = config.width;
    finalCanvas.height = config.height;
    const ctx = finalCanvas.getContext("2d");

    for (let i = 0; i < TOTAL_PHOTOS; i++) {
        const photo = capturedPhotos[i];
        if (photo) {
            const position = config.photos[i];
            await drawPhotoToCanvas(
                ctx, 
                photo, 
                position.x, 
                position.y, 
                position.width, 
                position.height, 
                position.shape || "rect",
                position.rotate || 0
            );
        }
    }

    if (selectedFrame.image) {
        const frameImg = await getProcessedFrameImage(selectedFrame.image, config.width, config.height);
        ctx.drawImage(frameImg, 0, 0, config.width, config.height);
    }

    return finalCanvas.toDataURL("image/jpeg", 0.95);
}

async function finishPhotos() {
    showToast("Semua foto lengkap! Sedang memproses dan menyimpan hasil...", '⚙️', 0);

    const finalPhoto = await createFinalPhoto();
    if (!finalPhoto) {
        showToast("Gagal mengolah hasil foto!", '❌', 0);
        alert("Gagal membuat hasil foto.");
        return;
    }

    window.finalPhotoData = finalPhoto;
    const finalPhotoElem = document.getElementById("finalPhoto");
    if (finalPhotoElem) {
        finalPhotoElem.innerHTML = `<img src="${finalPhoto}" alt="Hasil Foto Final">`;
    }

    try {
        const formData = new FormData();
        formData.append("photo", finalPhoto);
        formData.append("nama", sessionStorage.getItem("maba_nama") || "");
        formData.append("nim", sessionStorage.getItem("maba_nim") || "");
        formData.append("fakultas", sessionStorage.getItem("maba_fakultas") || "");
        formData.append("prodi", sessionStorage.getItem("maba_prodi") || "");
        formData.append("angkatan", sessionStorage.getItem("maba_angkatan") || "");
        formData.append("email", sessionStorage.getItem("maba_email") || "");

        const response = await fetch("save_photo.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();
        if (!result.success) {
            showToast("Gagal menyimpan foto ke server!", '⚠️', 0);
            alert(result.message || "Foto gagal disimpan di server.");
            return;
        }

        window.savedPhotoUrl = result.url;
        showScreen("result");

        showToast("Selesai! Hasil photobooth kamu sudah siap 🎉. Kamu bisa unduh foto atau scan QR.", '✨', 0);

    } catch (error) {
        console.error("Error menyimpan foto:", error);
        showToast("Kesalahan jaringan saat menyimpan foto!", '❌', 0);
        alert("Terjadi kesalahan jaringan.");
    }
}

// ============================================
// QR BUTTON, RESTART & DOWNLOAD
// ============================================

if (qrButton) {
    qrButton.addEventListener("click", () => {
        if (!window.savedPhotoUrl) return;
        showScreen("qr");
        const qrCode = document.getElementById("qrCode");
        if (!qrCode) return;
        qrCode.innerHTML = "";
        new QRCode(qrCode, { text: window.savedPhotoUrl, width: 250, height: 250 });

        showToast("Scan QR Code menggunakan HP untuk unduh softfile foto.", '📱', 0);
    });
}

if (restartButton) {
    restartButton.addEventListener("click", () => {
        resetPhotobooth();
        showScreen("welcome");
        showToast("Photobooth direset. Selamat datang kembali!", '🔄', 0);
    });
}

function resetPhotobooth() {
    selectedFrame = null;
    activeSlotIndex = 0;
    capturedPhotos = [];
    currentPhotoData = null;
    window.finalPhotoData = null;
    window.savedPhotoUrl = null;

    if (continueFrameBtn) {
        continueFrameBtn.disabled = true;
        continueFrameBtn.textContent = "PILIH FRAME";
    }
    if (readyButton) readyButton.disabled = false;
    if (cameraStream) {
        cameraStream.getTracks().forEach(track => track.stop());
        cameraStream = null;
    }
}

if (qrBackButton) {
    qrBackButton.addEventListener("click", () => {
        showScreen("result");
        showToast("Hasil foto photobooth kamu sudah siap 🎉", '✨', 0);
    });
}

renderFrames();
showScreen("welcome");
showToast("Selamat datang! Klik tombol 'TAP TO START' untuk memulai.", '👋', 0);

if (downloadButton) {
    downloadButton.addEventListener("click", () => {
        if (!window.finalPhotoData) return;
        
        showToast("Mengunduh hasil foto ke direktori perangkat...", '⬇️', 0);

        const link = document.createElement("a");
        link.href = window.finalPhotoData;
        link.download = `PKKMB-2026-${Date.now()}.jpg`;
        document.body.appendChild(link);
        link.click();
        link.remove();
    });
}