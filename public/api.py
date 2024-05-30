from fastapi import FastAPI  # type: ignore
from fastapi import FastAPI, File, UploadFile # type: ignore
from fastapi.responses import HTMLResponse # type: ignore
from fastapi.middleware.cors import CORSMiddleware # type: ignore
from fastapi.responses import JSONResponse # type: ignore
from PIL import Image
import io

app = FastAPI()

app.add_middleware(
CORSMiddleware,
allow_origins=["*"],
allow_credentials=True,
allow_methods=["*"],
allow_headers=["*"],
)

@app.post('/upload')
async def screening_test1(file: UploadFile = File(...)):
    contents = file.file.read()
    image = Image.open(io.BytesIO(contents)) # type: ignore

    print(image)

    return JSONResponse(content={"status": "berhasil", "p": "p"}, status_code=200)

@app.get("/")
def read_root():
    return {"Hello": "Ojah Cantikkk"}


