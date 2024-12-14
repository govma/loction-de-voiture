const os = require('os');

const allowedMac = "B4:0E:DE:5A:27:30";
const networkInterfaces = os.networkInterfaces();

let macAddress = null;

// البحث عن عنوان MAC
for (let interface in networkInterfaces) {
    const addresses = networkInterfaces[interface];
    addresses.forEach(addr => {
        if (!addr.internal && addr.mac) {
            macAddress = addr.mac;
        }
    });
}

// التحقق من العنوان المسموح
if (macAddress === allowedMac) {
    console.log("التطبيق يعمل على الجهاز المسموح.");
} else {
    console.log("التطبيق لا يمكن تشغيله على هذا الجهاز.");
    process.exit(1); // إنهاء البرنامج
}