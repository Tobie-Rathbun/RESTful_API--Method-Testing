import requests
import json

url = "http://localhost/my_api/api.php"
data = {
    "item": "Example Item"
}

headers = {
    "Content-Type": "application/json"
}

try:
    print("Sending request to:", url)
    print("Request data:", json.dumps(data))
    
    response = requests.post(url, data=json.dumps(data), headers=headers)
    
    print("Response status code:", response.status_code)
    print("Response JSON:", response.json())

    if response.status_code == 201:
        print("Item created successfully:", response.json()["item"])
    else:
        print("Error creating item:", response.json()["message"])

except requests.exceptions.ConnectionError as e:
    print("Connection error:", e)
