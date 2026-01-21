import sys
import pypdf

def extract_text(pdf_path, output_path):
    try:
        reader = pypdf.PdfReader(pdf_path)
        text = ""
        for page in reader.pages:
            text += page.extract_text() + "\n"
        
        with open(output_path, "w", encoding="utf-8") as f:
            f.write(text)
        print(f"Extracted {pdf_path}")
    except Exception as e:
        print(f"Error extracting {pdf_path}: {e}")

if __name__ == "__main__":
    extract_text("/Users/sergiosandoval/Downloads/webapp 5/pdf cours /Cahier des charges Wassim.pdf", "wassim.txt")
    extract_text("/Users/sergiosandoval/Downloads/webapp 5/pdf cours /RéférentielActivitésCompétencesEvaluationTPCDUI (2).pdf", "referentiel.txt")
