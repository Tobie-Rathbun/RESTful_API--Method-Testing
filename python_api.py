import requests
import json

url = "http://localhost/my_api/api.php"
data = {
    "item": "Example Item"
}

headers = {
    "Content-Type": "application/json"
}

print("Sending request to:", url)  # Add this line
print("Request data:", json.dumps(data))  # Add this line

response = requests.post(url, data=json.dumps(data), headers=headers)

print("Response JSON:", response.json())

if response.status_code == 201:
    print("Item created successfully:", response.json()["item"])
else:
    print("Error creating item:", response.json()["message"])
