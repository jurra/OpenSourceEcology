# Documentation of D3D printer workshop website
## Goal of the website
The website is the channel  through which OSE workshops are posted and organized.
It's main aim is to call for replication workshops of a certain machine.
This website is a module of general workshops of many other machines.
## Design assumptions requirements
### Users side (assumptions)
The user gets at the first sight what is the workshop about.
Will want to either join a workshop, create a new workshop or download documentation to decide later.
### OSE's side as a community (assumptions)
Get in touch with potential developers and people that one to join our development team, or become technology replicators.
### User Segments
1. People that want to develop skills
2. Groups of individuals that one to start a business using D3D technology and cluster.
### User stories/ Features coherent with design assumptions

<table>

    <tr>
        <th>What(Requirements)</td>
				<th>How(Specifications)</td>
				<th>Status</th>
    </tr>

		<tr>
			<td> Interact with the 3D model really fast and start underestanding the printers design.</td>
			<td> Current Solution: Embedding sketchfab code on the header of the page. Done in header.php code.<br>
			Ideal: Do it with three.js/WebGl Open Source Resources.
			</td>
			<td>Done MVP</td>
		</tr>

		<tr>
			<td> Be able to easily download the model and open it on your desktop </td>
			<td> Download a zipfile from OSE website/ or dropbox/ GitHub/ or Google Drive </td>
			<td>To do<br>
			1. Create a file to download the model(similar to part library)
			</td>
		</tr>

		<tr>
			<td> Signup for an event and pay if needed easily</td>
			<td> Current solution: Embedding/or Linking to EventBrite. Specifically within the posts loop. </td>
			<td>Not Done/tested</td>
		</tr>

		<tr>
			<td>As OSE community is nice to map the location of people to organize events close to the area.<br>
			Implications: Login and data about the location of the person is important</td>
			<td> Solution:<br>
			Ideal Solution:<br></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
</table>
