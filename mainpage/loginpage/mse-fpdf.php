from fpdf import FPDF

# Create instance of FPDF class
pdf = FPDF()

# Add a page
pdf.add_page()

# Set font for the entire document
pdf.set_font("Arial", size=12)

# Add a cell
pdf.cell(200, 10, txt="Welcome to FPDF!", ln=True, align="C")

# Add another cell
pdf.cell(200, 10, txt="This is a basic example of creating PDF using FPDF.", ln=True, align="C")

# Add a line break
pdf.ln(10)

# Add another cell
pdf.cell(200, 10, txt="You can customize the content as per your requirements.", ln=True, align="C")

# Save the PDF
pdf.output("basic_example.pdf")
