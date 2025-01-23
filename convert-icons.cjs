const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const iconsDir = path.join(__dirname, 'resources/images/icons');

async function convertHtmlToPng() {
  const browser = await puppeteer.launch({ headless: true });
  const page = await browser.newPage();

  const files = fs.readdirSync(iconsDir).filter(file => file.endsWith('.html'));

  for (const file of files) {
    const htmlPath = path.join(iconsDir, file);
    const pngPath = path.join(iconsDir, file.replace('.html', '.png'));

    const htmlContent = fs.readFileSync(htmlPath, 'utf8');
    await page.setContent(htmlContent);
    await page.screenshot({ path: pngPath });
  }

  await browser.close();
}

convertHtmlToPng().catch(console.error);
