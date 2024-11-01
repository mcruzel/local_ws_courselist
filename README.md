
# local_ws_courselist

**Webservice function for course list platform**

## Description

The `local_ws_courselist` plugin is a Moodle plugin that provides a web service to list all available courses on the platform, including each course’s unique ID (`id`), full name (`fullname`), short name (`shortname`), and the category ID (`categoryid`) it belongs to.

## Features

- **Course List**: Retrieves available courses on Moodle with the following details:
  - `id`: the unique identifier for the course.
  - `fullname`: the full name of the course.
  - `shortname`: the short name of the course.
  - `categoryid`: the unique identifier of the category the course belongs to.

## Requirements

- **Moodle**: Minimum version required: 3.11.
- **Permissions**: Users must have the `moodle/course:view` capability to access this service.

## Installation

1. Download the `local_ws_courselist` folder into the `local` directory of your Moodle installation.
2. Access the site administration to complete the plugin installation.
3. Enable web services in Moodle administration if needed and assign permissions to authorized users.

## Usage

### Web Service Endpoint

**Function**: `local_ws_courselist_get_courses`

**Description**: Retrieves the list of available courses on Moodle.

**Example Response**:

```json
[
  {
    "id": 1,
    "fullname": "Sample Course",
    "shortname": "Sample",
    "categoryid": 3
  },
  {
    "id": 2,
    "fullname": "Another Course",
    "shortname": "Another",
    "categoryid": 3
  }
]
```

### Testing the Web Service

To test this web service, use a tool like `curl` or Postman with a valid API token for a user with the required permissions.

**Example cURL Request**:

```bash
curl -X POST "https://your-moodle-site.com/webservice/rest/server.php" \
     -d "wstoken=YOUR_TOKEN" \
     -d "wsfunction=local_ws_courselist_get_courses" \
     -d "moodlewsrestformat=json"
```

## Customization

This plugin can be modified to further restrict accessible courses or include additional information as needed.

## Author

Maxime Cruzel

## License

This project is licensed under the MIT License.
