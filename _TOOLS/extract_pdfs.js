const fs = require('fs');
const pdf = require('pdf-parse');

async function extractText(filePath) {
    const dataBuffer = fs.readFileSync(filePath);
    const data = await pdf(dataBuffer);
    return data.text;
}

async function main() {
    try {
        const wassimText = await extractText('/Users/sergiosandoval/Downloads/webapp 5/pdf cours /Cahier des charges Wassim.pdf');
        fs.writeFileSync('wassim.txt', wassimText);

        const referentielText = await extractText('/Users/sergiosandoval/Downloads/webapp 5/pdf cours /RéférentielActivitésCompétencesEvaluationTPCDUI (2).pdf');
        fs.writeFileSync('referentiel.txt', referentielText);

        console.log('Extraction complete');
    } catch (error) {
        console.error('Error:', error);
    }
}

main();
